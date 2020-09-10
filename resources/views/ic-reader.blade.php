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
    </div>
</x-app-layout>

{{-- @once
    @push('scripts') --}}
        
    {{-- @endpush
@endonce --}}

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
            click() {
                this.isLoading = true

                this.getData()
                    .then(response => {
                        this.isLoading = false
                        
                        console.log(response.Data.MYKAD)
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
                // sohai()
                // fetch('http://localhost:9000/api/BT/MyKad/Read', {
                //     method: 'GET',
                //     headers: {
                //         'accept': '*/*',
                //         'Access-Control-Allow-Origin': '*'
                //     }
                // }).then(reponse => console.log(reponse))
                // .then(response => console.log(response))
                // .catch(error => console.log(error))

                // $.ajax({
                //     dataType: "json",
                //     url: 'http://localhost:9000/api/BT/MyKad/Read?callback=?',
                //     success: function (response) {
                //         this.isLoading = false
                //         console.log(response)
                //     },
                //     error: function (error) {
                //         this.isLoading = false
                //         console.log(error)
                //     }
                // })
                    
                // let jqXHRReadMyKad = BT_HELPER.fnTriggerReadMyKad();

                // jqXHRReadMyKad.done(function (results) {
                //     console.log(results)
                // })
                // .fail(function (jqXHR, textStatus, errorThrown) {
                //     console.log("error while reading MyKad");
                // })
                // .always(function () {
                //     console.log("MyKad reading completed!");
                // });
                
            },
            getData() {
                return $.ajax({
                    dataType: 'json',
                    url: 'http://localhost:9000/api/BT/MyKad/Read?callback=?',
                    type: 'GET',
                });
            }
        }
    }
</script>
