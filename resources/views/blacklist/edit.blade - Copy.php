@extends('layouts.app', ['activePage' => 'blacklist-management', 'titlePage' => __('messages.blacklist_management')])

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
                <h4 class="card-title">{{ __('messages.update_report') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('blacklist.index') }}" class="btn btn-sm btn-primary">{{ __('messages.back_list') }}</a>
                  </div>
                </div>
                
                <div class="row">

                  <div class="col-12">
                    <div class="row " style=" min-height: 100%; align-items: center;">
                      <img class="avatar-image" id="avatar_image" src="/uploads/blacklists/{{ old('avatar', $blacklist->avatar) }}">
                    </div>
                    <input id="avatar" type="file" name="avatar" style="display: none" onchange="updateAvatarImage(this)">
                  </div>

                </div>
                <br><br>

                <div class="row padding5">
                  <div class="col-lg-6">

                    <div class="row">
                      <div class="col-12">
                        <div class="form-group{{ $errors->has('full_name') ? ' has-danger' : '' }}">
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <input class="form-control" data-toggle="datepicker" name="birthday" id="input-birthday" value="{{ old('birthday', $blacklist->birthday) }}" type="text" placeholder="{{ __('messages.birthday') }}" value="" required />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12">
                        <div class="form-group{{ $errors->has('type_id') ? ' has-danger' : '' }}">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12">
                        <div class="form-group{{ $errors->has('national_id_card_no') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('national_id_card_no') ? ' is-invalid' : '' }}" value="{{ old('national_id_card_no', $blacklist->national_id_card_no) }}" name="national_id_card_no" id="input-national_id_card_no" type="text" placeholder="{{ __('messages.national_id_card') }}" value="{{ old('national_id_card_no') }}" />
                          @if ($errors->has('national_id_card_no'))
                            <span id="national_id_card_no-error" class="error text-danger" for="input-national_id_card_no">{{ $errors->first('national_id_card_no') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-12">
                        <div class="form-group{{ $errors->has('country_residence') ? ' has-danger' : '' }}">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('zip_code') ? ' has-danger' : '' }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12">
                          <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12">
                          <div class="form-group{{ $errors->has('maidenname') ? ' has-danger' : '' }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('country_birth') ? ' has-danger' : '' }}">
                          </div>
                        </div>
                      </div>

                       <div class="row">
                       <div class="col-12">
                          <div class="form-group{{ $errors->has('color_eye') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('color_eye') ? ' is-invalid' : '' }}" value="{{ old('color_eye', $blacklist->color_eye) }}" name="color_eye" id="input-color_eye" type="text" placeholder="{{ __('messages.color_eye') }}" value="{{ old('color_eye') }}" />
                            @if ($errors->has('color_eye'))
                              <span id="color_eye-error" class="error text-danger" for="input-color_eye">{{ $errors->first('color_eye') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('visible_peculiarity') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('visible_peculiarity') ? ' is-invalid' : '' }}" value="{{ old('visible_peculiarity', $blacklist->visible_peculiarity) }}" name="visible_peculiarity" id="input-visible_peculiarity" type="text" placeholder="{{ __('messages.visible_pesuliarity') }}" value="{{ old('visible_peculiarity') }}" />
                            @if ($errors->has('visible_peculiarity'))
                              <span id="visible_peculiarity-error" class="error text-danger" for="input-visible_peculiarity">{{ $errors->first('visible_peculiarity') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('profession') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('profession') ? ' is-invalid' : '' }}" value="{{ old('profession', $blacklist->profession) }}" name="profession" id="input-profession" type="text" placeholder="{{ __('messages.profession') }}" value="{{ old('profession') }}" />
                            @if ($errors->has('profession'))
                              <span id="profession-error" class="error text-danger" for="input-profession">{{ $errors->first('profession') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                       <div class="row">
                       <div class="col-12">
                          <div class="form-group{{ $errors->has('surburb') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('surburb') ? ' is-invalid' : '' }}" value="{{ old('surburb', $blacklist->surburb) }}" name="surburb" id="input-surburb" type="text" placeholder="{{ __('messages.surburb') }}" value="{{ old('surburb') }}" />
                            @if ($errors->has('surburb'))
                              <span id="surburb-error" class="error text-danger" for="input-surburb">{{ $errors->first('surburb') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('telephone_no') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('telephone_no') ? ' is-invalid' : '' }}" value="{{ old('telephone_no', $blacklist->telephone_no) }}" name="telephone_no" id="input-telephone_no" type="text" placeholder="{{ __('messages.telephone') }}" value="{{ old('telephone_no') }}" />
                            @if ($errors->has('telephone_no'))
                              <span id="telephone_no-error" class="error text-danger" for="input-telephone_no">{{ $errors->first('telephone_no') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                  </div>

                  
                  <div class="col-lg-6">

                    <div class="row">
                    <div class="col-12">
                        <div class="form-group{{ $errors->has('business') ? ' has-danger' : '' }}">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-12">
                        <div class="form-group{{ $errors->has('nationality') ? ' has-danger' : '' }}">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-12">
                        <div class="form-group{{ $errors->has('social_security_no') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('social_security_no') ? ' is-invalid' : '' }}" value="{{ old('social_security_no', $blacklist->social_security_no) }}" name="social_security_no" id="input-social_security_no" type="text" placeholder="{{ __('messages.social_security') }}" value="{{ old('social_security_no') }}" />
                          @if ($errors->has('social_security_no'))
                            <span id="social_security_no-error" class="error text-danger" for="input-social_security_no">{{ $errors->first('social_security_no') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-12">
                          <div class="form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                          </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-12">
                          <div class="form-group{{ $errors->has('othername') ? ' has-danger' : '' }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('city_birth') ? ' has-danger' : '' }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('height') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" value="{{ old('height', $blacklist->height) }}" name="height" id="input-height" type="text" placeholder="{{ __('messages.height') }}" value="{{ old('height') }}" />
                            @if ($errors->has('height'))
                              <span id="height-error" class="error text-danger" for="input-height">{{ $errors->first('height') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('color_hair') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('color_hair') ? ' is-invalid' : '' }}" value="{{ old('color_hair', $blacklist->color_hair) }}" name="color_hair" id="input-color_hair" type="text" placeholder="{{ __('messages.color_hair') }}" value="{{ old('color_hair') }}" />
                            @if ($errors->has('color_hair'))
                              <span id="color_hair-error" class="error text-danger" for="input-color_hair">{{ $errors->first('color_hair') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('marital_status') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('marital_status') ? ' is-invalid' : '' }}" value="{{ old('marital_status', $blacklist->marital_status) }}" name="marital_status" id="input-marital_status" type="text" placeholder="{{ __('messages.marital_status') }}" value="{{ old('marital_status') }}" />
                            @if ($errors->has('marital_status'))
                              <span id="marital_status-error" class="error text-danger" for="input-marital_status">{{ $errors->first('marital_status') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('city_residence') ? ' has-danger' : '' }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('postal_address') ? ' has-danger' : '' }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email', $blacklist->email) }}" name="email" id="input-email" type="email" placeholder="{{ __('messages.email') }}" value="{{ old('email') }}"/>
                            @if ($errors->has('email'))
                              <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('phone_no') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" value="{{ old('phone_no', $blacklist->phone_no) }}" name="phone_no" id="input-phone_no" type="text" placeholder="{{ __('messages.phone') }}" value="{{ old('phone_no') }}" />
                            @if ($errors->has('phone_no'))
                              <span id="phone_no-error" class="error text-danger" for="input-phone_no">{{ $errors->first('phone_no') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-12">
                          <div class="form-group{{ $errors->has('accomplice') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('accomplice') ? ' is-invalid' : '' }}" value="{{ old('accomplice', $blacklist->accomplice) }}" name="accomplice" id="input-accomplice" type="text" placeholder="{{ __('messages.accoplice') }}" value="{{ old('accomplice') }}" />
                            @if ($errors->has('accomplice'))
                              <span id="accomplice-error" class="error text-danger" for="input-accomplice">{{ $errors->first('accomplice') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                  </div>
                </div>

                <div class="row padding5">
                  <div class="col-12">

                    <label class="col-12 col-form-label">{{ __('messages.short_report_detail') }}</label>
                    <div class="col-12">
                      <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
                        <textarea class="form-control custom-text-area {{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" id="input-content" type="text" placeholder="{{ __('messages.insert_detail') }}"  required="true" aria-required="true" rows="10">
                    {{ old('content', $blacklist->content) }}
                        </textarea>
                        @if ($errors->has('content'))
                          <span id="content-error" class="error text-danger" for="input-content">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>

                  </div>
                </div>

                <input type='hidden' id="image_names" name="image_names">
                <div class="row padding5" id="image_div">
                </div>

                <div class="row padding5">
                  <div class="clone hide">
                    <div class="control-group input-group col-sm-12" style="margin-top:10px">
                      <div class="file-div">
                        <input type="file" id="input0" name="contentfiles[]" accept="image/*">
                      </div>
                      <div class="input-group-btn"> 
                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> {{ __('messages.remove') }}</button>
                      </div>
                    </div>
                  </div>

                  <div class="input-group control-group increment col-sm-12">
                    <div class="file-div">
                      <input type="file" id="input1" name="contentfiles[]" accept="image/*">
                    </div>
                    <div class="input-group-btn"> 
                      <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>{{ __('messages.add') }}</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
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
    <?php
        echo "const content_images = ". json_encode(json_decode($blacklist->content_files)) . ";\n";
    ?>
    let remainImageIndexs = [];
    
    $(document).ready(function() {
    var fileCnt = 2;
      
      if (content_images) {
            let image_html = "";
            let i = 0;
            content_images.forEach(function(element) {

              image_html += '<div class="col-sm-6 col-md-4 col-xl-3">';
              image_html += '<div class="col">';
              image_html += '<img src="/uploads/blacklist_contents/' + element + '" class="d-block content-holder">';
              image_html += '<img class="cancel-image" src="/material/img/cancel.png" style="display:none" id="cancel_image_' + i + '">';
              image_html += '<div class="row justify-content-center input-group-btn">';
              image_html += '<button class="btn btn-success" onclick="addImage(' + i + ')" type="button">{{ __('messages.add')}}</button>';
              image_html += '<button class="btn btn-danger" onclick="removeImage(' + i + ')" type="button">{{ __('messages.remove')}}</button>';
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