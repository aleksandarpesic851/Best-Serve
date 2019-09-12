@extends('layouts.app', ['activePage' => 'blacklist-management', 'titlePage' => __('Blacklist Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form enctype="multipart/form-data" method="post" action="{{ route('blacklist.update', $blacklist) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Update Report') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('blacklist.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                
                <div class="row">

                  <div class="col-12 col-md-4">
                    <div class="row " style=" min-height: 100%; align-items: center;">
                      <img class="avatar-image" id="avatar_image" src="/uploads/blacklists/{{ old('avatar', $blacklist->avatar) }}">
                    </div>
                    <input id="avatar" type="file" name="avatar" style="display: none" onchange="updateAvatarImage(this)">
                  </div>

                  <div class="col-12 col-md-8">

                      <label class="col-12 col-form-label">{{ __('Report Details') }}</label>
                      <div class="col-12" style="border: 1px solid #ddd;">
                        <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
                          <textarea class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" id="input-content" type="text" placeholder="{{ __('Insert report details here.') }}"  required="true" aria-required="true" rows="10">
{{ old('content', $blacklist->content) }}
                          </textarea>
                          @if ($errors->has('content'))
                            <span id="content-error" class="error text-danger" for="input-content">{{ $errors->first('name') }}</span>
                          @endif
                        </div>
                      </div>

                  </div>

                </div>

                <div class="row padding5">
                  <div class="col-lg-6">

                    <div class="row">
                      <label class="col-sm-4 col-md-3 col-form-label">{{ __('Full Name') }}</label>
                      <div class="col-sm-8 col-md-9">
                        <div class="form-group{{ $errors->has('full_name') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" value="{{ old('full_name', $blacklist->full_name) }}" name="full_name" id="input-full_name" type="text" placeholder="{{ __('Full Name') }}" value="{{ old('full_name') }}" required="true" aria-required="true"/>
                          @if ($errors->has('full_name'))
                            <span id="full_name-error" class="error text-danger" for="input-full_name">{{ $errors->first('name') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <label class="col-sm-4 col-md-3 col-form-label" for="input-birthday">{{ __('Birthday') }}</label>
                      <div class="col-sm-8 col-md-9">
                        <div class="form-group">
                          <input class="form-control" data-toggle="datepicker" name="birthday" id="input-birthday" value="{{ old('birthday', $blacklist->birthday) }}" type="text" placeholder="{{ __('Birthday') }}" value="" required />
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <label class="col-sm-4 col-md-3 col-form-label">{{ __('National Id Card Number') }}</label>
                      <div class="col-sm-8 col-md-9">
                        <div class="form-group{{ $errors->has('national_id_card_no') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('national_id_card_no') ? ' is-invalid' : '' }}" value="{{ old('national_id_card_no', $blacklist->national_id_card_no) }}" name="national_id_card_no" id="input-national_id_card_no" type="text" placeholder="{{ __('National Id Card Number') }}" value="{{ old('national_id_card_no') }}" />
                          @if ($errors->has('national_id_card_no'))
                            <span id="national_id_card_no-error" class="error text-danger" for="input-national_id_card_no">{{ $errors->first('national_id_card_no') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-4 col-md-3 col-form-label">{{ __('Country Residence') }}</label>
                      <div class="col-sm-8 col-md-9">
                        <div class="form-group{{ $errors->has('country_residence') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('country_residence') ? ' is-invalid' : '' }}" value="{{ old('country_residence', $blacklist->country_residence) }}" name="country_residence" id="input-country_residence" type="text" placeholder="{{ __('Country Residence') }}" value="{{ old('country_residence') }}" />
                          @if ($errors->has('country_residence'))
                            <span id="country_residence-error" class="error text-danger" for="input-country_residence">{{ $errors->first('country_residence') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Zip Code') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('zip_code') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" value="{{ old('zip_code', $blacklist->zip_code) }}" name="zip_code" id="input-zip_code" type="text" placeholder="{{ __('Zip Code') }}" value="{{ old('zip_code') }}" />
                            @if ($errors->has('zip_code'))
                              <span id="zip_code-error" class="error text-danger" for="input-zip_code">{{ $errors->first('zip_code') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('First Name') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" value="{{ old('firstname', $blacklist->firstname) }}" name="firstname" id="input-firstname" type="text" placeholder="{{ __('First Name') }}" value="{{ old('firstname') }}" />
                            @if ($errors->has('firstname'))
                              <span id="firstname-error" class="error text-danger" for="input-firstname">{{ $errors->first('firstname') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Maiden Name') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('maidenname') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('maidenname') ? ' is-invalid' : '' }}" value="{{ old('maidenname', $blacklist->maidenname) }}" name="maidenname" id="input-maidenname" type="text" placeholder="{{ __('Maiden Name') }}" value="{{ old('maidenname') }}" />
                            @if ($errors->has('maidenname'))
                              <span id="maidenname-error" class="error text-danger" for="input-maidenname">{{ $errors->first('maidenname') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Country of Birth') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('country_birth') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('country_birth') ? ' is-invalid' : '' }}" value="{{ old('country_birth', $blacklist->country_birth) }}" name="country_birth" id="input-country_birth" type="text" placeholder="{{ __('Country of Birth') }}" value="{{ old('country_birth') }}" />
                            @if ($errors->has('country_birth'))
                              <span id="country_birth-error" class="error text-danger" for="input-country_birth">{{ $errors->first('country_birth') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                       <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Color of Eye') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('color_eye') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('color_eye') ? ' is-invalid' : '' }}" value="{{ old('color_eye', $blacklist->color_eye) }}" name="color_eye" id="input-color_eye" type="text" placeholder="{{ __('Color of Eye') }}" value="{{ old('color_eye') }}" />
                            @if ($errors->has('color_eye'))
                              <span id="color_eye-error" class="error text-danger" for="input-color_eye">{{ $errors->first('color_eye') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Visible Peculiarity') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('visible_peculiarity') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('visible_peculiarity') ? ' is-invalid' : '' }}" value="{{ old('visible_peculiarity', $blacklist->visible_peculiarity) }}" name="visible_peculiarity" id="input-visible_peculiarity" type="text" placeholder="{{ __('Visible Peculiarity') }}" value="{{ old('visible_peculiarity') }}" />
                            @if ($errors->has('visible_peculiarity'))
                              <span id="visible_peculiarity-error" class="error text-danger" for="input-visible_peculiarity">{{ $errors->first('visible_peculiarity') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Profession') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('profession') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('profession') ? ' is-invalid' : '' }}" value="{{ old('profession', $blacklist->profession) }}" name="profession" id="input-profession" type="text" placeholder="{{ __('Profession') }}" value="{{ old('profession') }}" />
                            @if ($errors->has('profession'))
                              <span id="profession-error" class="error text-danger" for="input-profession">{{ $errors->first('profession') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                       <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Surburb') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('surburb') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('surburb') ? ' is-invalid' : '' }}" value="{{ old('surburb', $blacklist->surburb) }}" name="surburb" id="input-surburb" type="text" placeholder="{{ __('Surburb') }}" value="{{ old('surburb') }}" />
                            @if ($errors->has('surburb'))
                              <span id="surburb-error" class="error text-danger" for="input-surburb">{{ $errors->first('surburb') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Telephone Number') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('telephone_no') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('telephone_no') ? ' is-invalid' : '' }}" value="{{ old('telephone_no', $blacklist->telephone_no) }}" name="telephone_no" id="input-telephone_no" type="text" placeholder="{{ __('Telephone Number') }}" value="{{ old('telephone_no') }}" />
                            @if ($errors->has('telephone_no'))
                              <span id="telephone_no-error" class="error text-danger" for="input-telephone_no">{{ $errors->first('telephone_no') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                  </div>

                  
                  <div class="col-lg-6">

                    <div class="row">
                      <label class="col-sm-4 col-md-3 col-form-label" for="input-business">{{ __(' Business') }}</label>
                      <div class="col-sm-8 col-md-9">
                        <div class="form-group{{ $errors->has('business') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('business') ? ' is-invalid' : '' }}" value="{{ old('business', $blacklist->business) }}"  type="text" name="business" id="input-business" placeholder="{{ __('Business') }}" value="" required />
                          @if ($errors->has('business'))
                            <span id="business-error" class="error text-danger" for="input-business">{{ $errors->first('business') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-4 col-md-3 col-form-label">{{ __('Nationality') }}</label>
                      <div class="col-sm-8 col-md-9">
                        <div class="form-group{{ $errors->has('nationality') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}" value="{{ old('nationality', $blacklist->nationality) }}" name="nationality" id="input-nationality" type="text" placeholder="{{ __('Nationality') }}" value="{{ old('nationality') }}" required />
                          @if ($errors->has('nationality'))
                            <span id="nationality-error" class="error text-danger" for="input-nationality">{{ $errors->first('nationality') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-4 col-md-3 col-form-label">{{ __('Social Security Number') }}</label>
                      <div class="col-sm-8 col-md-9">
                        <div class="form-group{{ $errors->has('social_security_no') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('social_security_no') ? ' is-invalid' : '' }}" value="{{ old('social_security_no', $blacklist->social_security_no) }}" name="social_security_no" id="input-social_security_no" type="text" placeholder="{{ __('Social Security Number') }}" value="{{ old('social_security_no') }}" />
                          @if ($errors->has('social_security_no'))
                            <span id="social_security_no-error" class="error text-danger" for="input-social_security_no">{{ $errors->first('social_security_no') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Surname') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" value="{{ old('surname', $blacklist->surname) }}" name="surname" id="input-surname" type="text" placeholder="{{ __('Surname') }}" value="{{ old('surname') }}" />
                            @if ($errors->has('surname'))
                              <span id="surname-error" class="error text-danger" for="input-surname">{{ $errors->first('surname') }}</span>
                            @endif
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Other Name') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('othername') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('othername') ? ' is-invalid' : '' }}" value="{{ old('othername', $blacklist->othername) }}" name="othername" id="input-othername" type="text" placeholder="{{ __('othername') }}" value="{{ old('Other Name') }}" />
                            @if ($errors->has('othername'))
                              <span id="othername-error" class="error text-danger" for="input-othername">{{ $errors->first('othername') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('City of Birth') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('city_birth') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('city_birth') ? ' is-invalid' : '' }}" value="{{ old('city_birth', $blacklist->city_birth) }}" name="city_birth" id="input-city_birth" type="text" placeholder="{{ __('City of Birth') }}" value="{{ old('city_birth') }}" />
                            @if ($errors->has('city_birth'))
                              <span id="city_birth-error" class="error text-danger" for="input-city_birth">{{ $errors->first('city_birth') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Height') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('height') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" value="{{ old('height', $blacklist->height) }}" name="height" id="input-height" type="text" placeholder="{{ __('Height') }}" value="{{ old('height') }}" />
                            @if ($errors->has('height'))
                              <span id="height-error" class="error text-danger" for="input-height">{{ $errors->first('height') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Color of Hair') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('color_hair') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('color_hair') ? ' is-invalid' : '' }}" value="{{ old('color_hair', $blacklist->color_hair) }}" name="color_hair" id="input-color_hair" type="text" placeholder="{{ __('Color of Hair') }}" value="{{ old('color_hair') }}" />
                            @if ($errors->has('color_hair'))
                              <span id="color_hair-error" class="error text-danger" for="input-color_hair">{{ $errors->first('color_hair') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Marital Status') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('marital_status') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('marital_status') ? ' is-invalid' : '' }}" value="{{ old('marital_status', $blacklist->marital_status) }}" name="marital_status" id="input-marital_status" type="text" placeholder="{{ __('Marital Status') }}" value="{{ old('marital_status') }}" />
                            @if ($errors->has('marital_status'))
                              <span id="marital_status-error" class="error text-danger" for="input-marital_status">{{ $errors->first('marital_status') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('City Residence') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('city_residence') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('city_residence') ? ' is-invalid' : '' }}" value="{{ old('city_residence', $blacklist->city_residence) }}" name="city_residence" id="input-city_residence" type="text" placeholder="{{ __('City Residence') }}" value="{{ old('city_residence') }}" />
                            @if ($errors->has('city_residence'))
                              <span id="city_residence-error" class="error text-danger" for="input-city_residence">{{ $errors->first('city_residence') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Postal Address') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('postal_address') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('postal_address') ? ' is-invalid' : '' }}" value="{{ old('postal_address', $blacklist->postal_address) }}" name="postal_address" id="input-postal_address" type="text" placeholder="{{ __('Postal Address') }}" value="{{ old('postal_address') }}" />
                            @if ($errors->has('postal_address'))
                              <span id="postal_address-error" class="error text-danger" for="input-postal_address">{{ $errors->first('postal_address') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Email') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email', $blacklist->email) }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}"/>
                            @if ($errors->has('email'))
                              <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-4 col-md-3 col-form-label">{{ __('Phone Number') }}</label>
                        <div class="col-sm-8 col-md-9">
                          <div class="form-group{{ $errors->has('phone_no') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" value="{{ old('phone_no', $blacklist->phone_no) }}" name="phone_no" id="input-phone_no" type="text" placeholder="{{ __('Phone Number') }}" value="{{ old('phone_no') }}" />
                            @if ($errors->has('phone_no'))
                              <span id="phone_no-error" class="error text-danger" for="input-phone_no">{{ $errors->first('phone_no') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                  </div>
                </div>

                <input type='hidden' id="image_names" name="image_names">
                <div class="row padding5" id="image_div">
                </div>

                <div class="row padding5">
                  <div class="input-group control-group increment col-sm-12">
                    <input type="file" name="contentfiles[]" class="form-control" accept="image/*">
                    <div class="input-group-btn"> 
                      <button class="btn btn-success" type="button">Add</button>
                    </div>
                  </div>
                  <div class="clone hide">
                    <div class="control-group input-group col-sm-12" style="margin-top:10px">
                      <input type="file" name="contentfiles[]" class="form-control" accept="image/*">
                      <div class="input-group-btn"> 
                        <button class="btn btn-danger remove" type="button">Remove</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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

<script type="text/javascript">
    <?php
        echo "const content_images = ". json_encode(json_decode($blacklist->content_files)) . ";\n";
    ?>
    let remainImageIndexs = [];
    
    $(document).ready(function() {
      
      if (content_images) {
            let image_html = "";
            let i = 0;
            content_images.forEach(function(element) {

              image_html += '<div class="col-sm-6 col-md-4 col-xl-3">';
              image_html += '<div class="col">';
              image_html += '<img src="/uploads/blacklist_contents/' + element + '" class="d-block content-holder">';
              image_html += '<img class="cancel-image" src="/material/img/cancel.png" style="display:none" id="cancel_image_' + i + '">';
              image_html += '<div class="row justify-content-center input-group-btn">';
              image_html += '<button class="btn btn-success" onclick="addImage(' + i + ')" type="button">Add</button>';
              image_html += '<button class="btn btn-danger" onclick="removeImage(' + i + ')" type="button">Remove</button>';
              image_html += '</div>';
              image_html += '</div>';
              image_html += '</div>';
              remainImageIndexs.push(i);

              i++;
            });
            $('#image_div').html(image_html);
            $('#image_names').val(content_images);
      }

      $('#avatar_image').click(function() {
        $('#avatar').click();
      });
      $('[data-toggle="datepicker"]').datepicker({
        format:'yyyy-mm-dd'
      });

      
      $(".increment .btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
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
    function addImage(i) {
      if (!remainImageIndexs.includes(i)) {
        remainImageIndexs.push(i);
      }
      $('#cancel_image_'+i).hide();
      let images = [];
      remainImageIndexs.forEach(function(element) {
        images.push(content_images[element]);
      });
      $('#image_names').val(images);
      console.log(images);
    }

    function removeImage(i) {
      var index = remainImageIndexs.indexOf(i);
      if (index > -1) {
        remainImageIndexs.splice(index, 1);
      }
      $('#cancel_image_'+i).show();
      let images = [];
      remainImageIndexs.forEach(function(element) {
        images.push(content_images[element]);
      });
      $('#image_names').val(images);
      console.log(images);
    }
</script>
@endpush