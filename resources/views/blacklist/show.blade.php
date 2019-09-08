@extends('layouts.app', ['activePage' => 'blacklist-management', 'titlePage' => __('Blacklist Management')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">

                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Report To Black List') }}</h4>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('blacklist.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                            
                        <div class="row">

                            <div class="col-sm-3">
                                <div class="row " style=" min-height: 100%; align-items: center;">
                                    <img class="avatar-image" id="avatar_image" src="/uploads/blacklists/{{ old('avatar', $blacklist->avatar) }}">
                                </div>
                            </div>
                            
                            <div class="col-sm-8">
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Report Contents') }}</label>
                                    <div class="col-sm-12">
                                        <h5>{{ old('content', $blacklist->content) }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row padding5">
                        
                            <div class="col-sm-6" style="padding-right: 2%">

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Full Name') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('full_name', $blacklist->full_name) }}</h3>
                                    </div>
                                </div>
 
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Birthday') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('birthday', $blacklist->birthday) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('National Id Card Number') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('national_id_card_no', $blacklist->national_id_card_no) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Zip Code') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('zip_code', $blacklist->zip_code) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Full Name') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('full_name', $blacklist->full_name) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('First Name') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('firstname', $blacklist->firstname) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Maiden Name') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('maidenname', $blacklist->maidenname) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Country of Birth') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('country_birth', $blacklist->country_birth) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Color of Eye') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('color_eye', $blacklist->color_eye) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Visible Peculiarity') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('visible_peculiarity', $blacklist->visible_peculiarity) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Profession') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('profession', $blacklist->profession) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Surburb') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('surburb', $blacklist->surburb) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Telephone Number') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('telephone_no', $blacklist->telephone_no) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Phone Number') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('phone_no', $blacklist->phone_no) }}</h3>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-6" style="padding-left: 2%">
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Business') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('business', $blacklist->business) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Nationality') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('nationality', $blacklist->nationality) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Social Security Number') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('social_security_no', $blacklist->social_security_no) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Country Residence') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('country_residence', $blacklist->country_residence) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Surname') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('surname', $blacklist->surname) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Surname') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('surname', $blacklist->surname) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Other Name') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('othername', $blacklist->othername) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('City of Birth') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('city_birth', $blacklist->city_birth) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Height') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('height', $blacklist->height) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Color of Hair') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('color_hair', $blacklist->color_hair) }}</h3>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Marital Status') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('marital_status', $blacklist->marital_status) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('City Residence') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('city_residence', $blacklist->city_residence) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Postal Address') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('postal_address', $blacklist->postal_address) }}</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-9">
                                        <h3 class="blackinformation">{{ old('email', $blacklist->email) }}</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection