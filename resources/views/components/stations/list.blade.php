@props(['stations'])
<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h6>Stations</h6>
                <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">{{ count($stations) }} Stations</span> Found
                </p>
            </div>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs">Code</th>
                        <th class="text-uppercase text-secondary text-xxs">Name (English)</th>
                        <th class="text-uppercase text-secondary text-xxs ps-2">Name (Bangla)</th>
                        <th class="text-uppercase text-secondary text-xxs">Latitude</th>
                        <th class="text-uppercase text-secondary text-xxs">Longitude</th>
                        <th class="text-uppercase text-center text-secondary text-xxs">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($stations))
                        @foreach ($stations as $station)
                            <tr>
                                <td class="align-middle text-center text-sm">{{ $station->code }}</td>
                                <td class="align-middle text-left text-sm">{{ $station->name }}</td>
                                <td class="align-middle text-left text-sm">{{ $station->nameBN }}</td>
                                <td class="align-middle text-left text-sm">{{ $station->loc_lat }}</td>
                                <td class="align-middle text-left text-sm">{{ $station->loc_long }}</td>
                                <td class="align-middle text-center text-sm">
                                    <div class="btn-group">
                                        <a href="{{ route('station_data', ['station_code' => $station->code]) }}"
                                            class="btn btn-info" aria-current="page">
                                            Data
                                        </a>
                                        <a href="https://live3.bmd.gov.bd/weather-condition/web.php?view=web&stCode={{ $station->code }}&lang=EN"
                                            target="_blank" class="btn btn-success" aria-current="page">
                                            BMD
                                        </a>
                                        <a href="https://www.google.com/maps/search/{{ $station->loc_lat }},{{ $station->loc_long }}/{{ '@' . $station->loc_lat }},{{ $station->loc_long }},15z"
                                            target="_blank" class="btn btn-primary" aria-current="page">
                                            <i class="material-icons">map</i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
