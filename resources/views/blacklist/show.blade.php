@extends('layouts.app', ['activePage' => 'blacklist-management', 'titlePage' => __('messages.blacklisted_client')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">

                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('messages.blacklisted_client') }}</h4>
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
                            <div class="col-6" style="min-height: 100%; align-items: center; text-align: right">
                                <img class="avatar-image" id="avatar_image" src="/uploads/blacklists/{{ old('avatar', $blacklist->avatar) }}">
                            </div>
                            <div class="col-6" style="min-height: 100%; text-align: left; margin-top: 60px">
                                <strong class="blacklist-name">
                                    {{ old('full_name', $blacklist->full_name) }}
                                </strong>
                                <br>
                                <strong class="blacklist-name">
                                    {{ old('denounced_action', $blacklist->denounced_action) }}
                                </strong>
                                <br>
                                <strong class="blacklist-name">
                                    {{ old('affected_entity', $blacklist->affected_entity) }}
                                </strong>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="row">
                            <div class="col-12 col-md-8 offset-md-2">
                                <div class="row padding5">
                                    @if(!empty($blacklist->full_name))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.full_name') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('full_name', $blacklist->full_name) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->othername))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.other_name') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('othername', $blacklist->othername) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->firstname))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.first_name') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('firstname', $blacklist->firstname) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->surname))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.surname') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('surname', $blacklist->surname) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->maidenname))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.maiden_name') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('maidenname', $blacklist->maidenname) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->birthday))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.birthday') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('birthday', $blacklist->birthday) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->business))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.business') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('business', $blacklist->business) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->type_id))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.type_identification') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('type_id', $blacklist->type_id) }}&nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->national_id_card_no))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.national_id_card') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('national_id_card_no', $blacklist->national_id_card_no) }}&nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->nationality))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.nationality') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('nationality', $blacklist->nationality) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->zip_code))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.zip_code') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('zip_code', $blacklist->zip_code) }}&nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->postal_address))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.postal_address') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('postal_address', $blacklist->postal_address) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->city_residence))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.city_residence') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('city_residence', $blacklist->city_residence) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->city_birth))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.city_birth') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('city_birth', $blacklist->city_birth) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->country_birth))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.country_birth') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('country_birth', $blacklist->country_birth) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->country_residence))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.country_residence') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('country_residence', $blacklist->country_residence) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->social_security_no))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">   
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.social_security') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('social_security_no', $blacklist->social_security_no) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->profession))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.profession') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('profession', $blacklist->profession) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->email))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.email') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('email', $blacklist->email) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->phone_no))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.phone') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('phone_no', $blacklist->phone_no) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->visible_peculiarity))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.visible_pesuliarity') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('visible_peculiarity', $blacklist->visible_peculiarity) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->surburb))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.surburb') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('surburb', $blacklist->surburb) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->color_eye))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.color_eye') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('color_eye', $blacklist->color_eye) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->color_hair))
                                    <div class="col-12 col-lg-6">
                                    <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.color_hair') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('color_hair', $blacklist->color_hair) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->height))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.height') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('height', $blacklist->height) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->marital_status))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.marital_status') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('marital_status', $blacklist->marital_status) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->accomplice))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.accoplice') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('accomplice', $blacklist->accomplice) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->relationship_accomplice))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.relationship_accomplice') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('relationship_accomplice', $blacklist->relationship_accomplice) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->provided_service))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.provided_service') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('provided_service', $blacklist->provided_service) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->affected_entity))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.affected_entity') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('affected_entity', $blacklist->affected_entity) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->place_facts))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.place_facts') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('place_facts', $blacklist->place_facts) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->date_facts))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.date_facts') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('date_facts', $blacklist->date_facts) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->other_important_data))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.other_important_data') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('other_important_data', $blacklist->other_important_data) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($blacklist->denounced_action))
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <label class="col-5 col-lg-6 col-form-label">{{ __('messages.denounced_action') }}</label>
                                            <div class="col-7 col-lg-6">
                                                <h3 class="blackinformation">{{ old('denounced_action', $blacklist->denounced_action) }} &nbsp</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
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
                const currIndx = $('#carousel-content .active').index();
                console.log(currIndx);
                $('#carousel-content-dialog').carousel(currIndx);
            })
        }
    });

</script>
@endpush