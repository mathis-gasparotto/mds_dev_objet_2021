<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quote - {{ $mission->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
</head>
<body>
    <main>
        @if(!$mission->missionLines->isEmpty())
            <table>
                <tr>
                    <td class="text-uppercase fw-bold">{{ $mission->client->ref }}-{{ $mission->ref }}-DE</td>
                </tr>
                <tr>
                    <td class="text-uppercase fw-bold">{{ $mission->client->user->name }}</td>
                </tr>
                <tr>
                    <td>Email: {{ $mission->client->user->contact_email }}</td>
                </tr>
                <tr>
                    <td>Phone: {{ $mission->client->user->phone }}</td>
                </tr>
                <tr>
                    <td>Address: {{ $mission->client->user->address }}</td>
                </tr>
                <tr>
                    <td class="text-uppercase fw-bold">Bank Account</td>
                </tr>
                <tr>
                    <td>Bank Owner: {{ $mission->client->user->bank_account_owner }}</td>
                </tr>
                <tr>
                    <td>Domiciliation: {{ $mission->client->user->bank_domiciliation }}</td>
                </tr>
                <tr>
                    <td>RIB: {{ $mission->client->user->bank_rib }}</td>
                </tr>
                <tr>
                    <td>IBAN: {{ $mission->client->user->bank_iban }}</td>
                </tr>
                <tr>
                    <td>BIC: {{ $mission->client->user->bank_bic }}</td>
                </tr>
                <tr>
                    <td class="text-uppercase fw-bold">Company</td>
                </tr>
                <tr>
                    <td>Name: {{ $mission->client->user->company_name }}</td>
                </tr>
                <tr>
                    <td>SIRET: {{ $mission->client->user->company_siret }}</td>
                </tr>
                <tr>
                    <td>APE: {{ $mission->client->user->company_ape }}</td>
                </tr>
                <tr>
                    <td class="text-uppercase fw-bold">Client</td>
                </tr>
                <tr>
                    <td>Name: {{ $mission->client->name }}</td>
                </tr>
                @if($mission->client->email)
                    <tr>
                        <td>Email: {{ $mission->client->email }}</td>
                    </tr>
                @endif
                @if($mission->client->phone)
                    <tr>
                        <td>Phone: {{ $mission->client->phone }}</td>
                    </tr>
                @endif
                <tr>
                    <td>Address: {{ $mission->client->address }}</td>
                </tr>
                <tr>
                    <td>SIRET: {{ $mission->client->siret }}</td>
                </tr>
                <tr>
                    <td class="text-uppercase fw-bold">Mission</td>
                </tr>
                <tr>
                    <td>Title: {{ $mission->title }}</td>
                </tr>
                <tr>
                    <td>Down Payment: {{ $mission->down_payment }}%</td>
                </tr>
                <table class="table table-striped">
                    @php
                        $totalPrice = 0 ;
                    @endphp
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mission->missionLines as $missionLine)
                        <tr>
                            <th scope="row">{{ $missionLine->title }}</th>
                            <td>{{ $missionLine->quantity }} {{ $missionLine->unit }}</td>
                            <td>{{ number_format($missionLine->unit_price,2) }} €</td>
                            <td>{{ number_format($missionLine->quantity * $missionLine->unit_price,2) }} €</td>
                            @php
                                $totalPrice += $missionLine->quantity * $missionLine->unit_price;
                            @endphp
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <p class="card-text"><span class="card-label">Total price:</span> {{ number_format($totalPrice,2) }} €</p>
                <p class="card-text"><span class="card-label">Down Payment percentage:</span> {{ $mission->down_payment }}% ({{ number_format(($mission->down_payment/100)*$totalPrice,2) }} €)</p>
                @php
                    $totalPrice = 0 ;
                @endphp


            </table>
        @else
            <div class="text-center">
                <div class="alert alert-secondary mt-5 w-30 m-auto">You don't have any missions registered for this client</div>
                <a href="{{ route('missionLines.create', $mission) }}" class="btn btn-primary actions mt-5">Add an mission line</a>
                <a href="{{ route('missions.index', $mission->client) }}#{{ $mission->id }}" class="btn btn-warning actions mt-5">Go to the missions list</a>
            </div>
        @endif
    </main>

    <style>
        td {
            margin: 0 15px;
        }
    </style>
</body>
</html>


