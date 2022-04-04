@extends('../layout')

@section('content')

    <container class="card card-form">

        <h1 class="card-header text-center">Register</h1>

        <div class="card-body">
            <form action="{{route('auth.register')}}" method="post">
                @csrf
                <input type="number" value="{{ $github_id }}" name="github_id" hidden required>
                <div class="mb-3">
                    <label for="name" class="form-label form-required">Name:</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $name }}" type="text" name="name" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label form-required">Email:</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $email }}" type="email" name="email" required>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="contact_email" class="form-label form-required">Contact Email:</label>
                    <input class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" value="{{old('contact_email')}}" type="text" name="contact_email" required>
                    @error('contact_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label form-required">Phone:</label>
                    <input class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{old('phone')}}" type="text" name="phone" required>
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="address" class="form-label form-required">Address:</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" value="{{old('address')}}" name="address" required></textarea>
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="bank_account_owner" class="form-label form-required">Bank Account Owner:</label>
                    <input class="form-control @error('bank_account_owner') is-invalid @enderror" id="bank_account_owner" value="{{old('bank_account_owner')}}" type="text" name="bank_account_owner" required>
                    @error('bank_account_owner')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="bank_domiciliation" class="form-label form-required">Bank Domiciliation:</label>
                    <input class="form-control @error('bank_domiciliation') is-invalid @enderror" id="bank_domiciliation" value="{{old('bank_domiciliation')}}" type="text" name="bank_domiciliation" required>
                    @error('bank_domiciliation')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="bank_rib" class="form-label form-required">Bank RIB:</label>
                    <input class="form-control @error('bank_rib') is-invalid @enderror" id="bank_rib" value="{{old('bank_rib')}}" type="text" name="bank_rib" required>
                    @error('bank_rib')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="bank_iban" class="form-label form-required">Bank IBAN:</label>
                    <input class="form-control @error('bank_iban') is-invalid @enderror" id="bank_iban" value="{{old('bank_iban')}}" type="text" name="bank_iban" required>
                    @error('bank_iban')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="bank_bic" class="form-label form-required">Bank BIC:</label>
                    <input class="form-control @error('bank_bic') is-invalid @enderror" id="bank_bic" value="{{old('bank_bic')}}" type="text" name="bank_bic" required>
                    @error('bank_bic')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="company_name" class="form-label form-required">Company Name:</label>
                    <input class="form-control @error('company_name') is-invalid @enderror" id="company_name" value="{{old('company_name')}}" type="text" name="company_name" required>
                    @error('company_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="company_siret" class="form-label form-required">Company SIRET:</label>
                    <input class="form-control @error('company_siret') is-invalid @enderror" id="company_siret" value="{{old('company_siret')}}" type="text" name="company_siret" required>
                    @error('company_siret')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="company_ape" class="form-label form-required">Company APE:</label>
                    <input class="form-control @error('company_ape') is-invalid @enderror" id="company_ape" value="{{old('company_ape')}}" type="text" name="company_ape" required>
                    @error('company_ape')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </container>

@endsection
