<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">Upload Image</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="file" name="file" class="form-control form-control-solid mb-3 mb-lg-0" />
    <!--end::Input-->
</div>
<!--end::Input group-->
<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">Title</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="title" class="form-control form-control-solid mb-3 mb-lg-0" value="{{$card->title}}" placeholder="Name"  />
    <!--end::Input-->
</div>
<!--end::Input group-->


                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Card Number</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="card_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Card Number" value="{{$card->card_number}}" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->


<div class="mb-7" id="courses">
    <label for="" class="form-label">Card Types</label>
    <select required class="form-select form-select-solid" name="card_type_id" data-control="editselect2" data-dropdown-parent="#edit_modal" data-placeholder="Select a Type" data-allow-clear="true" >
        <option></option>
        @foreach ($CardTypes as $CardType)
            <option value="{{ $CardType->id }}"  @if ($CardType->id == $card->card_type_id) selected @endif>{{ $CardType->title }} - {{ $CardType->probability*100 }} %</option>
        @endforeach
    </select>
</div>

<div class="mb-7  " id="subject" >
    <label for="" class="form-label">Subjects</label>
    <select required class="form-select form-select-solid" name="subject"data-control="editselect2" data-dropdown-parent="#edit_modal" data-placeholder="Select a Subject" data-allow-clear="true" >
        <option></option>
        @foreach ($Subjects as $Subject)
            <option value="{{ $Subject->id }}" @if ($Subject->id == $card->subject_id) selected @endif>{{ $Subject->c_name }}</option>
        @endforeach
    </select>
</div>

<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">Description</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea class="form-control form-control-solid mb-3 mb-lg-0" id="add_description" name="description">{{$card->description}}</textarea>
    <!--end::Input-->
</div>
<!--end::Input group-->


<script>
    $(document).ready(function() {
        // Initialize select2 fields
        $('select[data-control="editselect2"]').select2({
            // Specify your select2 options here
        });

    });
</script>
