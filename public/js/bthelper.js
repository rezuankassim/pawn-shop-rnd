
var BT_UTILS = BT_UTILS || {};

/* UTILITY FUNCTIONS */

BT_UTILS.getImageURI = function (base64String) {
    return 'data:image/jpeg;base64, ' + base64String;
}

BT_UTILS.getBlankImageURI = function () {
    return 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';
}

BT_UTILS.formatDate = function (inDate) {
    if (inDate) {
        d = inDate;

        var dy = ("0" + d.getDate()).slice(-2);
        var mo = ("0" + (d.getMonth() + 1)).slice(-2);
        var yr = d.getFullYear();

        return dy + "-" + mo + "-" + yr;
    }
}

BT_UTILS.formatTime = function (inDate) {
    if (inDate) {
        d = inDate;

        var h = ("0" + d.getHours()).slice(-2);
        var m = ("0" + d.getMinutes()).slice(-2);
        var s = ("0" + d.getSeconds()).slice(-2);

        return h + ":" + m + ":" + s;
    }
}

BT_UTILS.formatDateTime = function (inDate) {
    if (inDate) {
        d = inDate;
        var dt = BT_UTILS.formatDate(d);
        var tm = BT_UTILS.formatTime(d);

        return dt + " " + tm;
    }
}

BT_UTILS.b64toBlob = function (b64Data, contentType, sliceSize) {
    const byteCharacters = atob(b64Data);
    const byteArrays = [];

    if (sliceSize == null) {
        sliceSize = 512;
    }

    if (contentType == null) {
        contentType = 'application/octet-stream';
    }

    for (let offset = 0; offset < byteCharacters.length; offset += sliceSize) {
        const slice = byteCharacters.slice(offset, offset + sliceSize);

        const byteNumbers = new Array(slice.length);
        for (let i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }

        const byteArray = new Uint8Array(byteNumbers);
        byteArrays.push(byteArray);
    }

    const blob = new Blob(byteArrays, { type: contentType });
    return blob;
}

BT_UTILS.downloadFile = function (fileName, source, contentType) {

    var blobData = BT_UTILS.b64toBlob(source, contentType);

    if (window.navigator && window.navigator.msSaveOrOpenBlob) { // for IE
        window.navigator.msSaveOrOpenBlob(blobData, fileName);
    } else {
        $("<a />", {
            // if supported , set name of file
            download: fileName,
            // set `href` to `objectURL` of `Blob` of `textarea` value
            href: URL.createObjectURL(blobData)
        })
            // append `a` element to `body`
            // call `click` on `DOM` element `a`
            .appendTo("body")[0].click();
        // remove appended `a` element after "Save File" dialog,
        // `window` regains `focus`
        $(window).one("focus", function () {
            $("a").last().remove()
        });
    }

}

/* AJAX CALLS */

var BT_HELPER = (function () {

    var serverURL = "http://localhost:9000/";
    var checkStatusFrequency = 8000;
    var checkStatusInterval;
    var fnCheckStatusHandler = null; /* Callback function to update Status ... */

    var debug = true;

    const FP_IMAGE_TYPES = {
        RAW: 1,
        BMP: 2,
        WSQ: 3
    }

    const FP_TEMPLATE_TYPES = {
        PK_COMP: 1,
        PK_MAT_NORM: 2,
        PK_COMP_NORM: 3,
        PK_MAT: 4,
        PK_ANSI_378: 5,
        MINEX_A: 6,
        ISO_FMR: 7,
        ISO_FMC_NS: 8
    }

    const MYKAD_FINGER_NOS = {
        ANY: 0,
        LEFT: 1,
        RIGHT: 2
    }

    return {

        FP_IMAGE_TYPE: FP_IMAGE_TYPES,

        FP_TEMPLATE_TYPE: FP_TEMPLATE_TYPES,

        MYKAD_FINGER_NO: MYKAD_FINGER_NOS,

        MONITOR_STATUS_FREQUENCY: checkStatusFrequency,

        log: function (msg) {
            if (debug) {
                console.log(msg);
            }
        },

        //Setup the Callback for CheckStatus
        setCheckStatusHandler: function (fnHandler) {
            fnCheckStatusHandler = fnHandler;
        },

        startStatusMonitor: function (interval, fnHandler) {
            if (fnHandler != null) {
                setCheckStatusHandler(fnHandler);
            }
            if (interval == null) {
                interval = checkStatusFrequency;
            }
            // No need to setup the timer, if the Callback is NOT SET!!
            if (fnCheckStatusHandler == null) return;
            checkStatusInterval = setInterval(this.fnTriggerCheckStatus, interval);
        },

        stopStatusMonitor: function () {
            if (checkStatusInterval) {
                clearInterval(checkStatusInterval);
            }
        },

        //This method, clears / stops the CheckStatus Timer and updates the Timer Interval * /
        resetStatusMonitor: function (newFreq) {
            this.stopStatusMonitor();
            if (newFreq) {
                interval = newFreq;
            } else {
                interval = checkStatusFrequency;
            }
            this.startStatusMonitor(interval);
            //log("Frequency = " + interval);
        },

        // AJAX Call to check/retrieve Status from the WebService
        // uses the statusHandler callback to update the status back to the calling method
        fnTriggerCheckStatus: function (statusHandler) {
            var getStatusURL = serverURL + 'api/BT/Status?callback=?';

            if (statusHandler == null) {
                statusHandler = fnCheckStatusHandler;
            }

            var jqxhr = $.ajax({
                url: getStatusURL,
                type: "GET",
                dataType: "jsonp",
                timeout: 1500,
                complete: function (jqXHR, textStatus) {
                    //log("Complete...");
                },
                success: function (data) {
                    //log("Success...");
                    var logDate = new Date(data.LastUpdateTime);
                    //updateStatus(data.ServiceStatus, data.LastStatusMessage, logDate);
                    if (statusHandler != null) {
                        statusHandler(data.ServiceStatus, data.LastStatusMessage, logDate);
                    } else {
                        BT_HELPER.log("Status Monitor is On! Status handler callback not set...");
                        BT_HELPER.log("Service Status [" + data.ServiceStatus + "] LastStatusMessage [" + data.LastStatusMessage + "] logDate [" + logDate + "]");
                    }
                    //updateStatus(data);
                },
                error: function (data, status, er) {
                    var logDate = new Date();
                    //log("Error occurred...");
                    //if (new String(data.status).valueOf() == new String("404").valueOf()) {
                    //    updateStatus("UNKNOWN", "BT Windows Service is probably NOT running [" + status + "/" + data.status + "]!!!", logDate);
                    //} else {
                    //    updateStatus(, "Error occurred [" + status + "/" + data.status + "]!!!", logDate);
                    //}
                    var msg = "";
                    if (new String(data.status).valueOf() == new String("404").valueOf()) {
                        msg = "BT Windows Service is probably NOT running [" + status + "/" + data.status + "]!!!";
                    } else {
                        msg = "Error occurred [" + status + "/" + data.status + "]!!!";
                    }
                    //updateStatus("UNKNOWN", data.LastStatusMessage, logDate);
                    if (statusHandler != null) {
                        statusHandler("UNKNOWN", data.LastStatusMessage, logDate);
                    } else {
                        BT_HELPER.log("Status Monitor is On! Status handler callback not set...");
                        BT_HELPER.log("Service Status [" + data.ServiceStatus + "] LastStatusMessage [" + data.LastStatusMessage + "] logDate [" + logDate + "]");
                    }
                }
            });

            return jqxhr;
        },

        // AJAX Call to Start Reading MyKad
        // returns the jqxhr object
        fnTriggerReadMyKad: function () {
            var readMyKadUrl = serverURL + 'api/BT/MyKad/Read?callback=?';
            this.resetStatusMonitor(2000);
            var jqxhr = $.getJSON(readMyKadUrl, null, function (data, status) {
                //log("ReadMyKad Call status [" + status + "]");
            })
                .fail(function (d, textStatus, error) {
                    BT_HELPER.log("ReadMyKad failed, status: [" + textStatus + "], error: [" + error + "]");
                })
                .always(function () {
                    BT_HELPER.log("ReadMyKad completed!");
                    BT_HELPER.resetStatusMonitor(checkStatusFrequency);
                });
            return jqxhr;
        },

        // AJAX Call to Start MyKad Fingerprint Verification
        // returns the jqxhr object
        fnTriggerMyKadFPVerification: function (fingerNo) {
            // 0 - AnyFinger, 1 - Left Thumb, 2 - Right Thumb
            var verificationUrl = serverURL + 'api/BT/MyKad/StartVerification?callback=?';
            this.resetStatusMonitor(2000);
            if (!(fingerNo == null || fingerNo == BT_HELPER.MYKAD_FINGER_NO.ANY)) {
                verificationUrl = serverURL + 'api/BT/MyKad/StartVerification?finger=' + fingerNo + '&callback=?';
            }
            var jqxhr = $.getJSON(verificationUrl, null, function (data, status) {
                //log("Fingerprint verification Status... [" + status + "]");
            })
                .fail(function (d, textStatus, error) {
                    BT_HELPER.log("Fingerprint verification failed, status: [" + textStatus + "], error: [" + error + "]");
                })
                .always(function () {
                    BT_HELPER.log("Fingerprint verification completed!");
                    BT_HELPER.resetStatusMonitor(checkStatusFrequency);
                });

            return jqxhr;
        },

        // AJAX Call to Start Reading MyKid 
        // returns the jqxhr object
        fnTriggerReadMyKid: function () {
            var readMyKidUrl = serverURL + 'api/BT/MyKid/Read?callback=?';
            this.resetStatusMonitor(2000);
            var jqxhr = $.getJSON(readMyKidUrl, null, function (data, status) {
                //log("ReadMyKid status [" + status + "]");
            })
                .fail(function (d, textStatus, error) {
                    BT_HELPER.log("ReadMyKid failed, status: [" + textStatus + "], error: [" + error + "]");
                })
                .always(function () {
                    BT_HELPER.log("ReadMyKid completed!");
                    BT_HELPER.resetStatusMonitor(checkStatusFrequency);
                });
            return jqxhr;
        },

        // AJAX Call to Get Fingerprint Image
        // returns the jqxhr object
        fnTriggerGetFPImage: function (imageType) {
            var getFPImgURL = serverURL + 'api/BT/BIO/GetFingerprintImage?imageType=' + imageType + '&callback=?';
            this.resetStatusMonitor(2000);
            var jqxhr = $.getJSON(getFPImgURL, null, function (data, status) {
                //log("ReadMyKad Call status [" + status + "]");
            })
                .fail(function (d, textStatus, error) {
                    BT_HELPER.log("GetFingerprintImage failed, status: [" + textStatus + "], error: [" + error + "]");
                })
                .always(function () {
                    BT_HELPER.log("GetFingerprint Image completed!");
                    BT_HELPER.resetStatusMonitor(checkStatusFrequency);
                });
            return jqxhr;
        },

        // AJAX Call to Get Fingerprint Image
        // returns the jqxhr object
        fnTriggerGetFPTemplate: function (templateType) {
            var getFPTemplateURL = serverURL + 'api/BT/BIO/GetFingerprintTemplate?templateType=' + templateType + '&callback=?';
            this.resetStatusMonitor(2000);
            var jqxhr = $.getJSON(getFPTemplateURL, null, function (data, status) {
                //log("ReadMyKad Call status [" + status + "]");
            })
                .fail(function (d, textStatus, error) {
                    BT_HELPER.log("GetFingerprintTemplate failed, status: [" + textStatus + "], error: [" + error + "]");
                })
                .always(function () {
                    BT_HELPER.log("GetFingerprint Image completed!");
                    BT_HELPER.resetStatusMonitor(checkStatusFrequency);
                });
            return jqxhr;
        },

        // AJAX Call to Verify Fingerprint Template
        // returns the jqxhr object
        fnTriggerVerifyFPTemplate: function (formData) {
            var verifyFPTemplateURL = serverURL + 'api/BT/BIO/VerifyFingerprintTemplate?&callback=?';
            this.resetStatusMonitor(2000);
            var jqxhr = $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: verifyFPTemplateURL,
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000
            })
                .fail(function (d, textStatus, error) {
                    BT_HELPER.log("fnTriggerVerifyFPTemplate failed, status: [" + textStatus + "], error: [" + error + "]");
                })
                .always(function () {
                    BT_HELPER.log("VerifyFingerprint Template completed!");
                    BT_HELPER.resetStatusMonitor(checkStatusFrequency);
                });


            return jqxhr;
        },


        // AJAX Call to Reset BT Windows Service
        // returns nothing!
        fnTriggerResetService: function () {
            var resetServiceUrl = serverURL + 'api/BT/ResetService?callback=?';
            this.resetStatusMonitor(2000);
            var jqxhr = $.getJSON(resetServiceUrl, null, function (data, status) {
                BT_HELPER.log("ResetService Call status [" + status + "]");
            })
                .done(function (results) {
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    BT_HELPER.log("error while ResetService");
                })
                .always(function () {
                    BT_HELPER.log("ResetService completed!");
                    BT_HELPER.resetStatusMonitor(checkStatusFrequency);
                });
        },

        // AJAX Call to Get System Info
        // returns jqxhr object!
        fnTriggerGetSystemInfo: function () {
            var getSystemInfoUrl = serverURL + 'api/BT/GetSystemInfo?callback=?';
            this.resetStatusMonitor(2000);
            var jqxhr = $.getJSON(getSystemInfoUrl, null, function (data, status) {
                BT_HELPER.log("GetSystemInfo Call status [" + status + "]");
            })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    BT_HELPER.log("error while GetSystemInfo");
                })
                .always(function () {
                    BT_HELPER.log("GetSystemInfo completed!");
                    BT_HELPER.resetStatusMonitor(checkStatusFrequency);
                });
            return jqxhr;
        }

    };

})();



