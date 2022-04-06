@extends('../layout')

@section('content')
    <form action="{{ route('auth.register') }}" method="post">
        @csrf
        <input type="hidden" name="github_id" value="{{ $github_id }}">
        <h1 class="text-center mb-5">Register</h1>

        <div class="dual-card mb-4">
            <container class="card card-form m-0">

                <h3 class="card-header text-center">Personal informations</h3>

                <div class="card-body">

                    <div class="form-floating mb-3">
                        <input placeholder="Name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $name }}" type="text" name="name">
                        <label for="name" class="form-label form-required">Name</label>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input placeholder="Email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $email }}" type="email" name="email" readonly>
                        <label for="email" class="form-label form-required">Email</label>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input placeholder="Contact Email" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" value="{{old('contact_email')}}" type="text" name="contact_email">
                        <label for="contact_email" class="form-label form-required">Contact Email</label>
                        @error('contact_email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{old('phone')}}" type="text" name="phone">
                        <label for="phone" class="form-label form-required">Phone</label>
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <textarea placeholder="Address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{old('address')}}" name="address"></textarea>
                        <label for="address" class="form-label form-required">Address</label>
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
            </container>
            <container class="card card-form m-0">

                <h3 class="card-header text-center">Bank informations</h3>


                <div class="card-body">
                    <div class="form-floating mb-3">
                        <input placeholder="Bank Account Owner" class="form-control @error('bank_account_owner') is-invalid @enderror" id="bank_account_owner" value="{{old('bank_account_owner')}}" type="text" name="bank_account_owner">
                        <label for="bank_account_owner" class="form-label form-required">Bank Account Owner</label>
                        @error('bank_account_owner')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input placeholder="Bank Domiciliation" class="form-control @error('bank_domiciliation') is-invalid @enderror" id="bank_domiciliation" value="{{old('bank_domiciliation')}}" type="text" name="bank_domiciliation">
                        <label for="bank_domiciliation" class="form-label form-required">Bank Domiciliation</label>
                        @error('bank_domiciliation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input placeholder="Bank RIB" class="form-control @error('bank_rib') is-invalid @enderror" id="bank_rib" value="{{old('bank_rib')}}" type="text" name="bank_rib">
                        <label for="bank_rib" class="form-label form-required">Bank RIB</label>
                        @error('bank_rib')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input placeholder="Bank IBAN" class="form-control @error('bank_iban') is-invalid @enderror" id="bank_iban" value="{{old('bank_iban')}}" type="text" name="bank_iban">
                        <label for="bank_iban" class="form-label form-required">Bank IBAN</label>
                        @error('bank_iban')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input placeholder="Bank BIC" class="form-control @error('bank_bic') is-invalid @enderror" id="bank_bic" value="{{old('bank_bic')}}" type="text" name="bank_bic">
                        <label for="bank_bic" class="form-label form-required">Bank BIC</label>
                        @error('bank_bic')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
            </container>
        </div>
        <div>
            <container class="card card-form">

                <h3 class="card-header text-center">Company informations</h3>


                <div class="card-body">
                    <div class="form-floating mb-3">
                        <input placeholder="Company Name" class="form-control @error('company_name') is-invalid @enderror" id="company_name" value="{{old('company_name')}}" type="text" name="company_name">
                        <label for="company_name" class="form-label form-required">Company Name</label>
                        @error('company_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input placeholder="Company SIRET" class="form-control @error('company_siret') is-invalid @enderror" id="company_siret" value="{{old('company_siret')}}" type="text" name="company_siret">
                        <label for="company_siret" class="form-label form-required">Company SIRET</label>
                        @error('company_siret')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input placeholder="Company APE" class="form-control @error('company_ape') is-invalid @enderror" id="company_ape" value="{{old('company_ape')}}" type="text" name="company_ape">
                        <label for="company_ape" class="form-label form-required">Company APE</label>
                        @error('company_ape')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
            </container>
        </div>
        <div class="cards-btn mt-4">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
            </div>
        </container>
    </form>

@endsection
