@extends('layouts.app', ['activePage' => 'blacklist-management', 'titlePage' => __('messages.blacklist_management')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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

                        <div class="row">
                            <div class="col-12 col-md-4 offset-lg-1">
                                    <div class="col-sm-12"  style="min-height: 100%; align-items: center; text-align: center">
                                        <img class="avatar-image" id="avatar_image" src="/uploads/blacklists/{{ old('avatar', $blacklist->avatar) }}">
                                    </div>
                            </div>
                            
                            <div class="col-12 col-md-6">
                                <div class="col-12 col-md-8 col-lg-6 justify-content-center" style="min-height: 100%; align-items: center; text-align: center; display: flex">
                                    <h2>{{ old('full_name', $blacklist->full_name) }}</h2>
                                </div>
                            </div>
                        </div>


<br>                        
                        <div class="row padding5">
                        
                            <div class="col-12 col-lg-6" style="padding-right: 2%">

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.full_name') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('full_name', $blacklist->full_name) }} &nbsp</h3>
                                    </div>
                                </div>
 
                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.birthday') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('birthday', $blacklist->birthday) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.national_id_card') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('national_id_card_no', $blacklist->national_id_card_no) }}&nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.zip_code') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('zip_code', $blacklist->zip_code) }}&nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.full_name') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('full_name', $blacklist->full_name) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.first_name') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('firstname', $blacklist->firstname) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.maiden_name') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('maidenname', $blacklist->maidenname) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.country_birth') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('country_birth', $blacklist->country_birth) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.color_eye') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('color_eye', $blacklist->color_eye) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.visible_pesuliarity') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('visible_peculiarity', $blacklist->visible_peculiarity) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.profession') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('profession', $blacklist->profession) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.surburb') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('surburb', $blacklist->surburb) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.telephone') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('telephone_no', $blacklist->telephone_no) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.phone') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('phone_no', $blacklist->phone_no) }} &nbsp</h3>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 col-lg-6" style="padding-left: 2%">
                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.business') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('business', $blacklist->business) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.nationality') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('nationality', $blacklist->nationality) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.social_security') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('social_security_no', $blacklist->social_security_no) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.country_residence') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('country_residence', $blacklist->country_residence) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.surname') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('surname', $blacklist->surname) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.other_name') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('othername', $blacklist->othername) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.city_birth') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('city_birth', $blacklist->city_birth) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.height') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('height', $blacklist->height) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.color_hair') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('color_hair', $blacklist->color_hair) }} &nbsp</h3>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.marital_status') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('marital_status', $blacklist->marital_status) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.city_residence') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('city_residence', $blacklist->city_residence) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.postal_address') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('postal_address', $blacklist->postal_address) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.email') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('email', $blacklist->email) }} &nbsp</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-5 col-sm-4 col-md-3 col-form-label">{{ __('messages.accoplice') }}</label>
                                    <div class="col-7 col-sm-8 col-md-9">
                                        <h3 class="blackinformation">{{ old('accomplice', $blacklist->accomplice) }} &nbsp</h3>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <br>
                        <div class="row padding5">
                            <div class="col-12">
                                <label class="col-12 col-form-label">{{ __('messages.report_content') }}</label>
                                <div class="col-12">
                                    <h5>{{ old('content', $blacklist->content) }}</h5>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="ro1 padding5">
                            <div class="col-12">
                                <div style="align-items: center;">
                                    <div id="content-images" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner" id="carousel-content">
                                            <div style="align-items: center;">
                                                <p>There is no attachted images</p>
                                            </div>
                                        </div>
                                        <div id="carousel-controler" style='display: none;'>
                                            <a class="carousel-control-prev carousel-control-button" href="#content-images" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next carousel-control-button" href="#content-images" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
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
</div>

<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="add-modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered custom-modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="ro1 padding5">
            <div class="col-12">
                <div style="align-items: center;">
                    <div id="content-images-dialog" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" id="carousel-content-dialog">
                            <div style="align-items: center;">
                                <p>There is no attachted images</p>
                            </div>
                        </div>
                        <div>
                            <a class="carousel-control-prev" href="#content-images-dialog" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#content-images-dialog" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>   
                </div>                             
            </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')
<script type="text/javascript">
    <?php
        echo "const content_images = ". json_encode(json_decode($blacklist->content_files)) . ";\n";
    ?>
    $(document).ready(function() {
        
        if (content_images) {
            let carousel_html = "";
            let i = 0;
            content_images.forEach(function(element) {
                if (i === 0) {
                    carousel_html += '<div class="carousel-item active text-center">';
                } else {
                    carousel_html += '<div class="carousel-item text-center">';
                }
                carousel_html += '<img class="slider-image img-fluid" src="/uploads/blacklist_contents/' + element + '">';
                carousel_html += '</div>';
                i++;
            });
            $('#carousel-content').html(carousel_html);
            $('#carousel-controler').show();
            $('#carousel-content-dialog').html(carousel_html);
            $('#carousel-content-dialog img').removeClass('slider-image');
            $('#carousel-content-dialog img').removeClass('img-fluid');
            $('#carousel-content').on('click', function() {
                $('#image-modal').modal('show');
            })
        }
    });

</script>
@endpush