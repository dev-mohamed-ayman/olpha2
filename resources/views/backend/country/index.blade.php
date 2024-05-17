@extends('backend.layouts.master')
@section('title', 'Countries')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target=".create" class="btn btn-primary">Create
                New Country</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Country Name</th>
                        <th>Currency</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($countries as $country)
                        <tr>
                            <th>{{$loop->index + 1}}</th>
                            <td>{{$country->name}}</td>
                            <td>{{$country->currency}}</td>
                            <td>
                                @if($country->status === 'hidden')
                                    <span class="badge badge-danger badge-lg">Hidden</span>
                                @else
                                    <span class="badge badge-success badge-lg">Visible</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                   data-bs-target=".edit{{$country->id}}" class="btn btn-sm btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('dashboard.country.destroy', $country->id)}}"
                                   class="btn btn-sm btn-danger delete-btn">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal Edit-->
                        <div class="modal fade edit{{$country->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Country</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                    </div>
                                    <form action="{{route('dashboard.country.update', $country->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-6  col-md-6 mb-4">
                                                    <label class="form-label font-w600">Country Name<span
                                                                class="text-danger scale5 ms-2">*</span></label>
                                                    <input type="text" name="name" value="{{$country->name}}"
                                                           class="form-control solid" placeholder="Country Name">
                                                </div>
                                                <div class="col-xl-6  col-md-6 mb-4">
                                                    <label class="form-label font-w600">Currency<span
                                                                class="text-danger scale5 ms-2">*</span></label>
                                                    <select name="currency" class="form-control">
                                                        <option disabled selected>Choose One...</option>
                                                        <option value="USD" {{ $country->currency == 'USD' ? 'selected' : ''  }}>
                                                            United States Dollars
                                                        </option>
                                                        <option value="EUR" {{ $country->currency == 'EUR' ? 'selected' : ''  }}>
                                                            Euro
                                                        </option>
                                                        <option value="GBP" {{ $country->currency == 'GBP' ? 'selected' : ''  }}>
                                                            United Kingdom Pounds
                                                        </option>
                                                        <option value="DZD" {{ $country->currency == 'DZD' ? 'selected' : ''  }}>
                                                            Algeria Dinars
                                                        </option>
                                                        <option value="ARP" {{ $country->currency == 'ARP' ? 'selected' : ''  }}>
                                                            Argentina Pesos
                                                        </option>
                                                        <option value="AUD" {{ $country->currency == 'AUD' ? 'selected' : ''  }}>
                                                            Australia Dollars
                                                        </option>
                                                        <option value="ATS" {{ $country->currency == 'ATS' ? 'selected' : ''  }}>
                                                            Austria Schillings
                                                        </option>
                                                        <option value="BSD" {{ $country->currency == 'BSD' ? 'selected' : ''  }}>
                                                            Bahamas Dollars
                                                        </option>
                                                        <option value="BBD" {{ $country->currency == 'BBD' ? 'selected' : ''  }}>
                                                            Barbados Dollars
                                                        </option>
                                                        <option value="BEF" {{ $country->currency == 'BEF' ? 'selected' : ''  }}>
                                                            Belgium Francs
                                                        </option>
                                                        <option value="BMD" {{ $country->currency == 'BMD' ? 'selected' : ''  }}>
                                                            Bermuda Dollars
                                                        </option>
                                                        <option value="BRR" {{ $country->currency == 'BRR' ? 'selected' : ''  }}>
                                                            Brazil Real
                                                        </option>
                                                        <option value="BGL" {{ $country->currency == 'BGL' ? 'selected' : ''  }}>
                                                            Bulgaria Lev
                                                        </option>
                                                        <option value="CAD" {{ $country->currency == 'CAD' ? 'selected' : ''  }}>
                                                            Canada Dollars
                                                        </option>
                                                        <option value="CLP" {{ $country->currency == 'CLP' ? 'selected' : ''  }}>
                                                            Chile Pesos
                                                        </option>
                                                        <option value="CNY" {{ $country->currency == 'CNY' ? 'selected' : ''  }}>
                                                            China Yuan Renmimbi
                                                        </option>
                                                        <option value="CYP" {{ $country->currency == 'CYP' ? 'selected' : ''  }}>
                                                            Cyprus Pounds
                                                        </option>
                                                        <option value="CSK" {{ $country->currency == 'CSK' ? 'selected' : ''  }}>
                                                            Czech Republic Koruna
                                                        </option>
                                                        <option value="DKK" {{ $country->currency == 'DKK' ? 'selected' : ''  }}>
                                                            Denmark Kroner
                                                        </option>
                                                        <option value="NLG" {{ $country->currency == 'NLG' ? 'selected' : ''  }}>
                                                            Dutch Guilders
                                                        </option>
                                                        <option value="XCD" {{ $country->currency == 'XCD' ? 'selected' : ''  }}>
                                                            Eastern Caribbean Dollars
                                                        </option>
                                                        <option value="EGP" {{ $country->currency == 'EGP' ? 'selected' : ''  }}>
                                                            Egypt Pounds
                                                        </option>
                                                        <option value="FJD" {{ $country->currency == 'FJD' ? 'selected' : ''  }}>
                                                            Fiji Dollars
                                                        </option>
                                                        <option value="FIM" {{ $country->currency == 'FIM' ? 'selected' : ''  }}>
                                                            Finland Markka
                                                        </option>
                                                        <option value="FRF" {{ $country->currency == 'FRF' ? 'selected' : ''  }}>
                                                            France Francs
                                                        </option>
                                                        <option value="DEM" {{ $country->currency == 'DEM' ? 'selected' : ''  }}>
                                                            Germany Deutsche Marks
                                                        </option>
                                                        <option value="XAU" {{ $country->currency == 'XAU' ? 'selected' : ''  }}>
                                                            Gold Ounces
                                                        </option>
                                                        <option value="GRD" {{ $country->currency == 'GRD' ? 'selected' : ''  }}>
                                                            Greece Drachmas
                                                        </option>
                                                        <option value="HKD" {{ $country->currency == 'HKD' ? 'selected' : ''  }}>
                                                            Hong Kong Dollars
                                                        </option>
                                                        <option value="HUF" {{ $country->currency == 'HUF' ? 'selected' : ''  }}>
                                                            Hungary Forint
                                                        </option>
                                                        <option value="ISK" {{ $country->currency == 'ISK' ? 'selected' : ''  }}>
                                                            Iceland Krona
                                                        </option>
                                                        <option value="INR" {{ $country->currency == 'INR' ? 'selected' : ''  }}>
                                                            India Rupees
                                                        </option>
                                                        <option value="IDR" {{ $country->currency == 'IDR' ? 'selected' : ''  }}>
                                                            Indonesia Rupiah
                                                        </option>
                                                        <option value="IEP" {{ $country->currency == 'IEP' ? 'selected' : ''  }}>
                                                            Ireland Punt
                                                        </option>
                                                        <option value="ILS" {{ $country->currency == 'ILS' ? 'selected' : ''  }}>
                                                            Israel New Shekels
                                                        </option>
                                                        <option value="ITL" {{ $country->currency == 'ITL' ? 'selected' : ''  }}>
                                                            Italy Lira
                                                        </option>
                                                        <option value="JMD" {{ $country->currency == 'JMD' ? 'selected' : ''  }}>
                                                            Jamaica Dollars
                                                        </option>
                                                        <option value="JPY" {{ $country->currency == 'JPY' ? 'selected' : ''  }}>
                                                            Japan Yen
                                                        </option>
                                                        <option value="JOD" {{ $country->currency == 'JOD' ? 'selected' : ''  }}>
                                                            Jordan Dinar
                                                        </option>
                                                        <option value="KRW" {{ $country->currency == 'KRW' ? 'selected' : ''  }}>
                                                            Korea (South) Won
                                                        </option>
                                                        <option value="LBP" {{ $country->currency == 'LBP' ? 'selected' : ''  }}>
                                                            Lebanon Pounds
                                                        </option>
                                                        <option value="LUF" {{ $country->currency == 'LUF' ? 'selected' : ''  }}>
                                                            Luxembourg Francs
                                                        </option>
                                                        <option value="MYR" {{ $country->currency == 'MYR' ? 'selected' : ''  }}>
                                                            Malaysia Ringgit
                                                        </option>
                                                        <option value="MXP" {{ $country->currency == 'MXP' ? 'selected' : ''  }}>
                                                            Mexico Pesos
                                                        </option>
                                                        <option value="NLG" {{ $country->currency == 'NLG' ? 'selected' : ''  }}>
                                                            Netherlands Guilders
                                                        </option>
                                                        <option value="NZD" {{ $country->currency == 'NZD' ? 'selected' : ''  }}>
                                                            New Zealand Dollars
                                                        </option>
                                                        <option value="NOK" {{ $country->currency == 'NOK' ? 'selected' : ''  }}>
                                                            Norway Kroner
                                                        </option>
                                                        <option value="PKR" {{ $country->currency == 'PKR' ? 'selected' : ''  }}>
                                                            Pakistan Rupees
                                                        </option>
                                                        <option value="XPD" {{ $country->currency == 'XPD' ? 'selected' : ''  }}>
                                                            Palladium Ounces
                                                        </option>
                                                        <option value="PHP" {{ $country->currency == 'PHP' ? 'selected' : ''  }}>
                                                            Philippines Pesos
                                                        </option>
                                                        <option value="XPT" {{ $country->currency == 'XPT' ? 'selected' : ''  }}>
                                                            Platinum Ounces
                                                        </option>
                                                        <option value="PLZ" {{ $country->currency == 'PLZ' ? 'selected' : ''  }}>
                                                            Poland Zloty
                                                        </option>
                                                        <option value="PTE" {{ $country->currency == 'PTE' ? 'selected' : ''  }}>
                                                            Portugal Escudo
                                                        </option>
                                                        <option value="ROL" {{ $country->currency == 'ROL' ? 'selected' : ''  }}>
                                                            Romania Leu
                                                        </option>
                                                        <option value="RUR" {{ $country->currency == 'RUR' ? 'selected' : ''  }}>
                                                            Russia Rubles
                                                        </option>
                                                        <option value="SAR" {{ $country->currency == 'SAR' ? 'selected' : ''  }}>
                                                            Saudi Arabia Riyal
                                                        </option>
                                                        <option value="XAG" {{ $country->currency == 'XAG' ? 'selected' : ''  }}>
                                                            Silver Ounces
                                                        </option>
                                                        <option value="SGD" {{ $country->currency == 'SGD' ? 'selected' : ''  }}>
                                                            Singapore Dollars
                                                        </option>
                                                        <option value="SKK" {{ $country->currency == 'SKK' ? 'selected' : ''  }}>
                                                            Slovakia Koruna
                                                        </option>
                                                        <option value="ZAR" {{ $country->currency == 'ZAR' ? 'selected' : ''  }}>
                                                            South Africa Rand
                                                        </option>
                                                        <option value="KRW" {{ $country->currency == 'KRW' ? 'selected' : ''  }}>
                                                            South Korea Won
                                                        </option>
                                                        <option value="ESP" {{ $country->currency == 'ESP' ? 'selected' : ''  }}>
                                                            Spain Pesetas
                                                        </option>
                                                        <option value="XDR" {{ $country->currency == 'XDR' ? 'selected' : ''  }}>
                                                            Special Drawing Right (IMF)
                                                        </option>
                                                        <option value="SDD" {{ $country->currency == 'SDD' ? 'selected' : ''  }}>
                                                            Sudan Dinar
                                                        </option>
                                                        <option value="SEK" {{ $country->currency == 'SEK' ? 'selected' : ''  }}>
                                                            Sweden Krona
                                                        </option>
                                                        <option value="CHF" {{ $country->currency == 'CHF' ? 'selected' : ''  }}>
                                                            Switzerland Francs
                                                        </option>
                                                        <option value="TWD" {{ $country->currency == 'TWD' ? 'selected' : ''  }}>
                                                            Taiwan Dollars
                                                        </option>
                                                        <option value="THB" {{ $country->currency == 'THB' ? 'selected' : ''  }}>
                                                            Thailand Baht
                                                        </option>
                                                        <option value="TTD" {{ $country->currency == 'TTD' ? 'selected' : ''  }}>
                                                            Trinidad and Tobago Dollars
                                                        </option>
                                                        <option value="TRL" {{ $country->currency == 'TRL' ? 'selected' : ''  }}>
                                                            Turkey Lira
                                                        </option>
                                                        <option value="VEB" {{ $country->currency == 'VEB' ? 'selected' : ''  }}>
                                                            Venezuela Bolivar
                                                        </option>
                                                        <option value="ZMK" {{ $country->currency == 'ZMK' ? 'selected' : ''  }}>
                                                            Zambia Kwacha
                                                        </option>
                                                        <option value="EUR" {{ $country->currency == 'EUR' ? 'selected' : ''  }}>
                                                            Euro
                                                        </option>
                                                        <option value="XCD" {{ $country->currency == 'XCD' ? 'selected' : ''  }}>
                                                            Eastern Caribbean Dollars
                                                        </option>
                                                        <option value="XDR" {{ $country->currency == 'XDR' ? 'selected' : ''  }}>
                                                            Special Drawing Right (IMF)
                                                        </option>
                                                        <option value="XAG" {{ $country->currency == 'XAG' ? 'selected' : ''  }}>
                                                            Silver Ounces
                                                        </option>
                                                        <option value="XAU" {{ $country->currency == 'XAU' ? 'selected' : ''  }}>
                                                            Gold Ounces
                                                        </option>
                                                        <option value="XPD" {{ $country->currency == 'XPD' ? 'selected' : ''  }}>
                                                            Palladium Ounces
                                                        </option>
                                                        <option value="XPT" {{ $country->currency == 'XPT' ? 'selected' : ''  }}>
                                                            Platinum Ounces
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-6  col-md-6 mb-4">
                                                    <label class="form-label font-w600">Status<span
                                                                class="text-danger scale5 ms-2">*</span></label>
                                                    <select name="status"
                                                            class="nice-select default-select wide form-control solid">
                                                        <option
                                                                value="visible" {{$country->status == 'visible' ? 'selected' : ''}}>
                                                            Visible
                                                        </option>
                                                        <option
                                                                value="hidden" {{$country->status == 'hidden' ? 'selected' : ''}}>
                                                            Hidden
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
                {{$countries->links()}}
            </div>
        </div>
    </div>
    <!-- Modal Create-->
    <div class="modal fade create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Country</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{route('dashboard.country.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Country Name<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="name" class="form-control solid" placeholder="Country Name">
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Currency<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                <select name="currency" class="form-control">
                                    <option disabled selected>Choose One...</option>
                                    <option value="USD">United States Dollars</option>
                                    <option value="EUR">Euro</option>
                                    <option value="GBP">United Kingdom Pounds</option>
                                    <option value="DZD">Algeria Dinars</option>
                                    <option value="ARP">Argentina Pesos</option>
                                    <option value="AUD">Australia Dollars</option>
                                    <option value="ATS">Austria Schillings</option>
                                    <option value="BSD">Bahamas Dollars</option>
                                    <option value="BBD">Barbados Dollars</option>
                                    <option value="BEF">Belgium Francs</option>
                                    <option value="BMD">Bermuda Dollars</option>
                                    <option value="BRR">Brazil Real</option>
                                    <option value="BGL">Bulgaria Lev</option>
                                    <option value="CAD">Canada Dollars</option>
                                    <option value="CLP">Chile Pesos</option>
                                    <option value="CNY">China Yuan Renmimbi</option>
                                    <option value="CYP">Cyprus Pounds</option>
                                    <option value="CSK">Czech Republic Koruna</option>
                                    <option value="DKK">Denmark Kroner</option>
                                    <option value="NLG">Dutch Guilders</option>
                                    <option value="XCD">Eastern Caribbean Dollars</option>
                                    <option value="EGP">Egypt Pounds</option>
                                    <option value="FJD">Fiji Dollars</option>
                                    <option value="FIM">Finland Markka</option>
                                    <option value="FRF">France Francs</option>
                                    <option value="DEM">Germany Deutsche Marks</option>
                                    <option value="XAU">Gold Ounces</option>
                                    <option value="GRD">Greece Drachmas</option>
                                    <option value="HKD">Hong Kong Dollars</option>
                                    <option value="HUF">Hungary Forint</option>
                                    <option value="ISK">Iceland Krona</option>
                                    <option value="INR">India Rupees</option>
                                    <option value="IDR">Indonesia Rupiah</option>
                                    <option value="IEP">Ireland Punt</option>
                                    <option value="ILS">Israel New Shekels</option>
                                    <option value="ITL">Italy Lira</option>
                                    <option value="JMD">Jamaica Dollars</option>
                                    <option value="JPY">Japan Yen</option>
                                    <option value="JOD">Jordan Dinar</option>
                                    <option value="KRW">Korea (South) Won</option>
                                    <option value="LBP">Lebanon Pounds</option>
                                    <option value="LUF">Luxembourg Francs</option>
                                    <option value="MYR">Malaysia Ringgit</option>
                                    <option value="MXP">Mexico Pesos</option>
                                    <option value="NLG">Netherlands Guilders</option>
                                    <option value="NZD">New Zealand Dollars</option>
                                    <option value="NOK">Norway Kroner</option>
                                    <option value="PKR">Pakistan Rupees</option>
                                    <option value="XPD">Palladium Ounces</option>
                                    <option value="PHP">Philippines Pesos</option>
                                    <option value="XPT">Platinum Ounces</option>
                                    <option value="PLZ">Poland Zloty</option>
                                    <option value="PTE">Portugal Escudo</option>
                                    <option value="ROL">Romania Leu</option>
                                    <option value="RUR">Russia Rubles</option>
                                    <option value="SAR">Saudi Arabia Riyal</option>
                                    <option value="XAG">Silver Ounces</option>
                                    <option value="SGD">Singapore Dollars</option>
                                    <option value="SKK">Slovakia Koruna</option>
                                    <option value="ZAR">South Africa Rand</option>
                                    <option value="KRW">South Korea Won</option>
                                    <option value="ESP">Spain Pesetas</option>
                                    <option value="XDR">Special Drawing Right (IMF)</option>
                                    <option value="SDD">Sudan Dinar</option>
                                    <option value="SEK">Sweden Krona</option>
                                    <option value="CHF">Switzerland Francs</option>
                                    <option value="TWD">Taiwan Dollars</option>
                                    <option value="THB">Thailand Baht</option>
                                    <option value="TTD">Trinidad and Tobago Dollars</option>
                                    <option value="TRL">Turkey Lira</option>
                                    <option value="VEB">Venezuela Bolivar</option>
                                    <option value="ZMK">Zambia Kwacha</option>
                                    <option value="EUR">Euro</option>
                                    <option value="XCD">Eastern Caribbean Dollars</option>
                                    <option value="XDR">Special Drawing Right (IMF)</option>
                                    <option value="XAG">Silver Ounces</option>
                                    <option value="XAU">Gold Ounces</option>
                                    <option value="XPD">Palladium Ounces</option>
                                    <option value="XPT">Platinum Ounces</option>
                                </select>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Status<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                <select name="status" class="nice-select default-select wide form-control solid">
                                    <option value="visible" selected>Visible</option>
                                    <option value="hidden">Hidden</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $('.js-example-basic-single').select2();--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
