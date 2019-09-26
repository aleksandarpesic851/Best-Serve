@extends('layouts.app', ['activePage' => 'blacklist-create', 'titlePage' => __('messages.blacklist_management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form enctype="multipart/form-data" method="post" action="{{ route('blacklist.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('messages.report_to_blacklist') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('blacklist.index') }}" class="btn btn-sm btn-primary">{{ __('messages.back_list') }}</a>
                  </div>
                </div>
                <br><br>
                <div class="row">
                  <div class="col-10 offset-1" style="border: 1px solid #d88">
                    {{ __('messages.create_method_detail')}}
                  </div>
                </div>
                <br><br>
                <div class="row">

                  <div class="col-12">
                    <div class="row " style=" min-height: 100%; align-items: center;">
                      <img class="avatar-image" id="avatar_image" src="/uploads/avatars/user.png">
                    </div>
                    <input id="avatar" type="file" name="avatar" style="display: none" onchange="updateAvatarImage(this)" accept="image/*">
                  </div>

                </div>
                <br><br>
                <div class="row">
                  <div class="col-12 col-md-10 offset-md-1">
                    <div class='row'>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('full_name') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" name="full_name" id="input-full_name" type="text" placeholder="{{ __('messages.full_name') }}" value="{{ old('full_name') }}" required="true" aria-required="true"/>
                              @if ($errors->has('full_name'))
                                <span id="full_name-error" class="error text-danger" for="input-full_name">{{ $errors->first('name') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('othername') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('othername') ? ' is-invalid' : '' }}" name="othername" id="input-othername" type="text" placeholder="{{ __('messages.other_name') }}" value="{{ old('messages.other_name') }}" />
                              @if ($errors->has('othername'))
                                <span id="othername-error" class="error text-danger" for="input-othername">{{ $errors->first('othername') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" id="input-firstname" type="text" placeholder="{{ __('messages.first_name') }}" value="{{ old('firstname') }}" />
                              @if ($errors->has('firstname'))
                                <span id="firstname-error" class="error text-danger" for="input-firstname">{{ $errors->first('firstname') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" id="input-surname" type="text" placeholder="{{ __('messages.surname') }}" value="{{ old('surname') }}" />
                              @if ($errors->has('surname'))
                                <span id="surname-error" class="error text-danger" for="input-surname">{{ $errors->first('surname') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('maidenname') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('maidenname') ? ' is-invalid' : '' }}" name="maidenname" id="input-maidenname" type="text" placeholder="{{ __('messages.maiden_name') }}" value="{{ old('maidenname') }}" />
                              @if ($errors->has('maidenname'))
                                <span id="maidenname-error" class="error text-danger" for="input-maidenname">{{ $errors->first('maidenname') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group">
                              <input class="form-control" data-toggle="datepicker" name="birthday" id="input-birthday" type="text" placeholder="{{ __('messages.birthday') }}" value="" required />
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('business') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('business') ? ' is-invalid' : '' }}" input type="text" name="business" id="input-business" placeholder="{{ __('messages.business') }}" value="" required />
                              @if ($errors->has('business'))
                                <span id="business-error" class="error text-danger" for="input-business">{{ $errors->first('business') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('type_id') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('type_id') ? ' is-invalid' : '' }}" name="type_id" id="input-type_id" type="text" placeholder="{{ __('messages.type_identification') }}" value="{{ old('type_id') }}" />
                              @if ($errors->has('type_id'))
                                <span id="type_id-error" class="error text-danger" for="input-type_id">{{ $errors->first('type_id') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('national_id_card_no') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('national_id_card_no') ? ' is-invalid' : '' }}" name="national_id_card_no" id="input-national_id_card_no" type="text" placeholder="{{ __('messages.national_id_card') }}" value="{{ old('national_id_card_no') }}" />
                              @if ($errors->has('national_id_card_no'))
                                <span id="national_id_card_no-error" class="error text-danger" for="input-national_id_card_no">{{ $errors->first('national_id_card_no') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('nationality') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}" name="nationality" id="input-nationality" type="text" placeholder="{{ __('messages.nationality') }}" value="{{ old('nationality') }}" required />
                              @if ($errors->has('nationality'))
                                <span id="nationality-error" class="error text-danger" for="input-nationality">{{ $errors->first('nationality') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                              <div class="form-group{{ $errors->has('zip_code') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" name="zip_code" id="input-zip_code" type="text" placeholder="{{ __('messages.zip_code') }}" value="{{ old('zip_code') }}" />
                                @if ($errors->has('zip_code'))
                                  <span id="zip_code-error" class="error text-danger" for="input-zip_code">{{ $errors->first('zip_code') }}</span>
                                @endif
                              </div>
                            </div>
                          </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('postal_address') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('postal_address') ? ' is-invalid' : '' }}" name="postal_address" id="input-postal_address" type="text" placeholder="{{ __('messages.postal_address') }}" value="{{ old('postal_address') }}" />
                              @if ($errors->has('postal_address'))
                                <span id="postal_address-error" class="error text-danger" for="input-postal_address">{{ $errors->first('postal_address') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('city_residence') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('city_residence') ? ' is-invalid' : '' }}" name="city_residence" id="input-city_residence" type="text" placeholder="{{ __('messages.city_residence') }}" value="{{ old('city_residence') }}" />
                              @if ($errors->has('city_residence'))
                                <span id="city_residence-error" class="error text-danger" for="input-city_residence">{{ $errors->first('city_residence') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('city_birth') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('city_birth') ? ' is-invalid' : '' }}" name="city_birth" id="input-city_birth" type="text" placeholder="{{ __('messages.city_birth') }}" value="{{ old('city_birth') }}" />
                              @if ($errors->has('city_birth'))
                                <span id="city_birth-error" class="error text-danger" for="input-city_birth">{{ $errors->first('city_birth') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('country_birth') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('country_birth') ? ' is-invalid' : '' }}" name="country_birth" id="input-country_birth" type="text" placeholder="{{ __('messages.country_birth') }}" value="{{ old('country_birth') }}" />
                              @if ($errors->has('country_birth'))
                                <span id="country_birth-error" class="error text-danger" for="input-country_birth">{{ $errors->first('country_birth') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('country_residence') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('country_residence') ? ' is-invalid' : '' }}" name="country_residence" id="input-country_residence" type="text" placeholder="{{ __('messages.country_residence') }}" value="{{ old('country_residence') }}" />
                              @if ($errors->has('country_residence'))
                                <span id="country_residence-error" class="error text-danger" for="input-country_residence">{{ $errors->first('country_residence') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('social_security_no') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('social_security_no') ? ' is-invalid' : '' }}" name="social_security_no" id="input-social_security_no" type="text" placeholder="{{ __('messages.social_security') }}" value="{{ old('social_security_no') }}" />
                              @if ($errors->has('social_security_no'))
                                <span id="social_security_no-error" class="error text-danger" for="input-social_security_no">{{ $errors->first('social_security_no') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('profession') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('profession') ? ' is-invalid' : '' }}" name="profession" id="input-profession" type="text" placeholder="{{ __('messages.profession') }}" value="{{ old('profession') }}" />
                              @if ($errors->has('profession'))
                                <span id="profession-error" class="error text-danger" for="input-profession">{{ $errors->first('profession') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('messages.email') }}" value="{{ old('email') }}" />
                              @if ($errors->has('email'))
                                <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('phone_no') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" id="input-phone_no" type="text" placeholder="{{ __('messages.phone') }}" value="{{ old('phone_no') }}" />
                              @if ($errors->has('phone_no'))
                                <span id="phone_no-error" class="error text-danger" for="input-phone_no">{{ $errors->first('phone_no') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('visible_peculiarity') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('visible_peculiarity') ? ' is-invalid' : '' }}" name="visible_peculiarity" id="input-visible_peculiarity" type="text" placeholder="{{ __('messages.visible_pesuliarity') }}" value="{{ old('visible_peculiarity') }}" />
                              @if ($errors->has('visible_peculiarity'))
                                <span id="visible_peculiarity-error" class="error text-danger" for="input-visible_peculiarity">{{ $errors->first('visible_peculiarity') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('surburb') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('surburb') ? ' is-invalid' : '' }}" name="surburb" id="input-surburb" type="text" placeholder="{{ __('messages.surburb') }}" value="{{ old('surburb') }}" />
                              @if ($errors->has('surburb'))
                                <span id="surburb-error" class="error text-danger" for="input-surburb">{{ $errors->first('surburb') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('color_eye') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('color_eye') ? ' is-invalid' : '' }}" name="color_eye" id="input-color_eye" type="text" placeholder="{{ __('messages.color_eye') }}" value="{{ old('color_eye') }}" />
                              @if ($errors->has('color_eye'))
                                <span id="color_eye-error" class="error text-danger" for="input-color_eye">{{ $errors->first('color_eye') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('color_hair') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('color_hair') ? ' is-invalid' : '' }}" name="color_hair" id="input-color_hair" type="text" placeholder="{{ __('messages.color_hair') }}" value="{{ old('color_hair') }}" />
                              @if ($errors->has('color_hair'))
                                <span id="color_hair-error" class="error text-danger" for="input-color_hair">{{ $errors->first('color_hair') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('height') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" id="input-height" type="text" placeholder="{{ __('messages.height') }}" value="{{ old('height') }}" />
                              @if ($errors->has('height'))
                                <span id="height-error" class="error text-danger" for="input-height">{{ $errors->first('height') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('marital_status') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('marital_status') ? ' is-invalid' : '' }}" name="marital_status" id="input-marital_status" type="text" placeholder="{{ __('messages.marital_status') }}" value="{{ old('marital_status') }}" />
                              @if ($errors->has('marital_status'))
                                <span id="marital_status-error" class="error text-danger" for="input-marital_status">{{ $errors->first('marital_status') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('accomplice') ? ' has-danger' : '' }}" data-toggle="tooltip" title="{{ __('messages.accomplice_tooltip') }}">
                              <input class="form-control{{ $errors->has('accomplice') ? ' is-invalid' : '' }}" name="accomplice" id="input-accomplice" type="text" placeholder="{{ __('messages.accoplice') }}" value="{{ old('accomplice') }}" />
                              @if ($errors->has('accomplice'))
                                <span id="accomplice-error" class="error text-danger" for="input-accomplice">{{ $errors->first('accomplice') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('relationship_accomplice') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('relationship_accomplice') ? ' is-invalid' : '' }}" name="relationship_accomplice" id="input-relationship_accomplice" type="text" placeholder="{{ __('messages.relationship_accomplice') }}" value="{{ old('relationship_accomplice') }}" />
                              @if ($errors->has('relationship_accomplice'))
                                <span id="relationship_accomplice-error" class="error text-danger" for="input-relationship_accomplice">{{ $errors->first('relationship_accomplice') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('provided_service') ? ' has-danger' : '' }}" data-toggle="tooltip" title="{{ __('messages.service_tooltip') }}">
                              <input class="form-control{{ $errors->has('provided_service') ? ' is-invalid' : '' }}" name="provided_service" id="input-provided_service" type="text" placeholder="{{ __('messages.provided_service') }}" value="{{ old('provided_service') }}"/>
                              @if ($errors->has('provided_service'))
                                <span id="provided_service-error" class="error text-danger" for="input-provided_service">{{ $errors->first('provided_service') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('affected_entity') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('affected_entity') ? ' is-invalid' : '' }}" name="affected_entity" id="input-affected_entity" type="text" placeholder="{{ __('messages.affected_entity') }}" value="{{ old('affected_entity') }}"/>
                              @if ($errors->has('affected_entity'))
                                <span id="affected_entity-error" class="error text-danger" for="input-affected_entity">{{ $errors->first('affected_entity') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('place_facts') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('place_facts') ? ' is-invalid' : '' }}" name="place_facts" id="input-place_facts" type="text" placeholder="{{ __('messages.place_facts') }}" value="{{ old('place_facts') }}"/>
                              @if ($errors->has('place_facts'))
                                <span id="place_facts-error" class="error text-danger" for="input-place_facts">{{ $errors->first('place_facts') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('date_facts') ? ' has-danger' : '' }}">
                              <input class="form-control" data-toggle="datepicker" name="date_facts" id="input-date_facts" type="text" placeholder="{{ __('messages.date_facts') }}" value="" required />
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('other_important_data') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('other_important_data') ? ' is-invalid' : '' }}" name="other_important_data" id="input-other_important_data" type="text" placeholder="{{ __('messages.other_important_data') }}" value="{{ old('other_important_data') }}"/>
                              @if ($errors->has('other_important_data'))
                                <span id="other_important_data-error" class="error text-danger" for="input-other_important_data">{{ $errors->first('other_important_data') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="row d-flex justify-content-center">
                          <div class="col-10">
                            <div class="form-group{{ $errors->has('denounced_action') ? ' has-danger' : '' }}"  data-toggle="tooltip" title="{{ __('messages.denounced_action_tootip') }}">
                              <input class="form-control{{ $errors->has('denounced_action') ? ' is-invalid' : '' }}" name="denounced_action" id="input-denounced_action" type="text" placeholder="{{ __('messages.denounced_action') }}" value="{{ old('denounced_action') }}"/>
                              @if ($errors->has('denounced_action'))
                                <span id="denounced_action-error" class="error text-danger" for="input-denounced_action">{{ $errors->first('denounced_action') }}</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                
                <div class="row padding5">
                  <div class="col-12">
                    <label class="col-sm-12 col-form-label">{{ __('messages.report_detail') }}</label>
                    <div class="col-sm-12">
                      <div class="form-group {{ $errors->has('content') ? ' has-danger' : '' }}">
                        <textarea class="form-control custom-text-area {{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" id="input-content" type="text" placeholder="{{ __('messages.insert_detail') }}" value="{{ old('content') }}" required="true" aria-required="true" rows="10"></textarea>
                        @if ($errors->has('content'))
                          <span id="content-error" class="error text-danger" for="input-content">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <br><br>
                <button id="add-new-image" class="btn btn-success" style="margin-left: 10%" type="button"><i class="glyphicon glyphicon-plus"></i>{{ __('messages.add') }}</button>

                <div class="row padding5">
                  <div class="clone hide increment">
                    <div class="col-6 control-group" style="margin-top:10px">
                      <div class="row justify-content-center ">
                        <img src="/material/img/image-upload.png" id="image-input0" class="file-upload-image">
                      </div>
                      <div class="row justify-content-center ">
                        <input type="file" id="input0" name="contentfiles[]" accept="image/*" data-input="false" onchange="changeImage(this)">
                        <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> {{ __('messages.remove') }}</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('messages.report_to_blacklist') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<link  href="/material/datepicker/datepicker.css" rel="stylesheet">
<script src="/material/datepicker/datepicker.js"></script>
<script src="/material/js/core/bootstrap-filestyle.min.js"></script>

<script type="text/javascript">
    var fileCnt = 2;
    $(document).ready(function() {
      
      $('#avatar_image').click(function() {
        $('#avatar').click();
      });
      $('[data-toggle="datepicker"]').datepicker({
        format:'yyyy-mm-dd'
      });

      $("#add-new-image").click(function(){ 
        var html = $(".clone").html();
        html = html.replace(/input0/g, 'input' + fileCnt);
        $(".increment").after(html);
        $('#input' + fileCnt).filestyle({
          // button text
          'text' : '{{ __("messages.choose_file") }}',
          // CSS class of button
          'btnClass' : 'btn-warning',
          // custom placeholder
          'placeholder': '{{ __("messages.file_not_choose") }}',
        });
        fileCnt++;
     });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });

      $('#input1').filestyle({
        // button text
        'text' : '{{ __("messages.choose_file") }}',
        // CSS class of button
        'btnClass' : 'btn-warning',
        // custom placeholder
        'placeholder': '{{ __("messages.file_not_choose") }}',
      });

    });

    function createObjectURL(object) {
      return (window.URL) ? window.URL.createObjectURL(object) : window.webkitURL.createObjectURL(object);
    }

    function updateAvatarImage(input) {
      const avatarImage = document.getElementById('avatar_image');
      const file = input.files[0];
      avatarImage.src = createObjectURL(file);
      avatarImage.onload = function() {
            window.URL.revokeObjectURL(this.src);
        }

    }

    function changeImage(input) {
      const file = input.files[0];
      const newImage = document.getElementById('image-' + input.id);
      newImage.src = createObjectURL(file);
      newImage.onload = function() {
          window.URL.revokeObjectURL(this.src);
      }
    }

    function revokeObjectURL(url) {
        return (window.URL) ? window.URL.revokeObjectURL(url) : window.webkitURL.revokeObjectURL(url);
    }

</script>
@endpush