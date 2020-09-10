<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            IC Reader
        </h2>
    </x-slot>

    <div class="py-12" x-data="reader()">
        <div class="max-w-7xl mx-auto space-y-3 sm:px-6 lg:px-8">

            <div class="flex space-x-2">
                <x-jet-button type="button" @click="click()" x-show="! isLoading">
                    Read
                </x-jet-button>

                <div x-show="icRead">
                    <x-jet-button type="button" @click="verifyFinger(0)" x-show="! isLoading">
                        Verify Any Finger
                    </x-jet-button>
    
    
                    <x-jet-button type="button" @click="verifyFinger(1)" x-show="! isLoading">
                        Verify Left Thumb
                    </x-jet-button>
    
                    <x-jet-button type="button" @click="verifyFinger(2)" x-show="! isLoading">
                        Verify Right Thumb
                    </x-jet-button>
                </div>
            </div>
            

            <div class="bg-white p-4 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="space-y-4">
                    <div class="w-1/3">
                        <label for="ic_no" class="block text-sm leading-5 font-medium text-gray-700">IC No.</label>
    
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="ic_no" name="ic_no" x-model="ic_no" class="form-input block w-full pr-12 sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    <div class="w-1/3">
                        <label for="name" class="block text-sm leading-5 font-medium text-gray-700">Name</label>
    
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="name" name="name" x-model="name" class="form-input block w-full pr-12 sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    <div class="w-1/3">
                        <label for="address" class="block text-sm leading-5 font-medium text-gray-700">Address</label>
    
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea id="address" address="address" x-model="address" class="form-textarea block w-full pr-12 sm:text-sm sm:leading-5" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="w-1/3">
                        <label for="year_of_birth" class="block text-sm leading-5 font-medium text-gray-700">Year of Birth</label>
    
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="year_of_birth" name="year_of_birth" x-model="year_of_birth" class="form-input block w-full pr-12 sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    <div class="w-1/3">
                        <label for="gender" class="block text-sm leading-5 font-medium text-gray-700">Gender</label>
    
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="gender" name="gender" x-model="gender" class="form-input block w-full pr-12 sm:text-sm sm:leading-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed z-10 inset-0 overflow-y-auto" x-show="verifyFailed">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!--
                    Background overlay, show/hide based on modal state.
            
                    Entering: "ease-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                    Leaving: "ease-in duration-200"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
            
                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
                <!--
                    Modal panel, show/hide based on modal state.
            
                    Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                    Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                <div @click.away="verifyFailed = false" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
    
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                    Verify Failed
                                </h3>
    
                                <div class="mt-2">
                                    <p class="text-sm leading-5 text-gray-500">
                                        The verification is failed.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button @click="verifyFailed = false" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Okay
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed z-10 inset-0 overflow-y-auto" x-show="verifySuccess">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!--
                    Background overlay, show/hide based on modal state.
            
                    Entering: "ease-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                    Leaving: "ease-in duration-200"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
            
                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
                <!--
                    Modal panel, show/hide based on modal state.
            
                    Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                    Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                <div @click.away="verifySuccess = false" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
    
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                    Verify Success
                                </h3>
    
                                <div class="mt-2">
                                    <p class="text-sm leading-5 text-gray-500">
                                        The verification is succeed.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button @click="verifySuccess = false" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Okay
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    let url = @json(config('services.bcrbt.url'));

    function reader() {
        return {
            ic_no: '',
            name: '',
            address: '',
            postcode: '',
            state: '',
            year_of_birth: '',
            gender: '',
            isLoading: false,
            verifyFailed : false,
            verifySuccess : false,
            icRead: false,
            click() {
                this.isLoading = true

                this.getData('http://localhost:9000/api/BT/MyKad/Read?callback=?')
                    .then(response => {
                        this.isLoading = false
                        this.icRead = true
                        this.ic_no = response.Data.MYKAD.ICNumber
                        this.name = response.Data.MYKAD.GMPCName
                        this.address = `${response.Data.MYKAD.Address1}${response.Data.MYKAD.Address2 ? ' '+response.Data.MYKAD.Address2 : ''}${response.Data.MYKAD.Address3 ? ' '+response.Data.MYKAD.Address3 : ''}`
                        this.postcode = response.Data.MYKAD.Postcode
                        this.year_of_birth = response.Data.MYKAD.DOB.split('-')[2]
                        this.gender = response.Data.MYKAD.Gender === 'L' ? 'Male' : 'Female'
                    })
                    .catch(error => {
                        this.isLoading = false
                        console.log(error)
                    })
            },
            verifyFinger(finger) {
                this.isLoading = true

                this.getData(`http://localhost:9000/api/BT/MyKad/StartVerification?finger=${finger}&callback=?`)
                    .then(response => {
                        console.log(response)
                        this.isLoading = false
                        
                        this.verifySuccess = true
                        this.verifyFailed = false
                    })
                    .catch(error => {
                        console.log(error)
                        this.isLoading = false

                        this.verifyFailed = true
                        this.verifySuccess = false
                    })
            },
            getData(url) {
                return $.ajax({
                    dataType: 'json',
                    url: url,
                    type: 'GET',
                });
            }
        }
    }
</script>
