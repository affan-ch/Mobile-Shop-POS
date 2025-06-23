<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">Upload Image</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="file" name="image" class="form-control form-control-solid mb-3 mb-lg-0" />
    <!--end::Input-->
</div>
<!--end::Input group-->
<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">Title</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="title" value="{{$course->title}}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name" required />
    <!--end::Input-->
</div>
<!--end::Input group-->

<div class="mb-10">
    <label for="" class="required form-label">Grade</label>
    <select class="form-select form-select-solid" name="grade" data-control="editselect3" data-dropdown-parent="#edit_modal" data-placeholder="Select a Grade" data-allow-clear="true" required>
        <option></option>
        @foreach ($grades as $grade)
            <option value="{{ $grade->value }}" {{ $course->grade == $grade->value ? 'selected' : '' }}>{{ $grade->class }}</option>
        @endforeach
    </select>
</div>
<!--begin::Input group-->
<div class="mb-10">
    <label for="" class="required form-label">Subject</label>
    <select id="edit_modal_subject" class="form-select form-select-solid" name="subject" data-control="editselect4" data-dropdown-parent="#edit_modal" data-placeholder="Select a Subject" data-allow-clear="true" required>
        <option></option>
        @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}" {{ $course->c_id == $subject->id ? 'selected' : '' }}>{{ $subject->c_name }}</option>
        @endforeach
    </select>
</div>
<!--begin::Input group-->
<div class="mb-10" id="edit_modal_sub_subject">
    <label for="" class="required form-label">Sub Subject</label>
    <select class="form-select form-select-solid" name="sub_subject" data-control="editselect5" data-dropdown-parent="#edit_modal" data-placeholder="Select a Sub Subject" data-allow-clear="true" required>
        <option></option>
        @foreach ($subSubjects as $subSubject)
            @if ($subSubject->c_id == $course->c_id)
            <option value="{{ $subSubject->id }}" {{ $course->sc_id == $subSubject->id ? 'selected' : '' }}>{{ $subSubject->sc_name }}</option>
            @endif
        @endforeach
    </select>
</div>
<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class=" fw-bold fs-6 mb-2">Description</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea class="form-control form-control-solid mb-3 mb-lg-0" id="add_description" name="description">{{$course->description}}</textarea>
    <!--end::Input-->
</div>
<!--end::Input group-->
<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class=" fw-bold fs-6 mb-2">Upload Files</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="file" name="files[]" class="form-control form-control-solid mb-3 mb-lg-0" multiple />
    <!--end::Input-->
</div>
<!--end::Input group-->
<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-bold fs-6 mb-2">Website Links</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input name="web_links[]" class="form-control form-control-solid mb-3 mb-lg-0"  value="{{$courseYTLinksValues}}" id="kt_tagify_3"/>
    <!--end::Input-->
</div>
<!--end::Input group-->
<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-bold fs-6 mb-2">Youtube Links</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input name="youtube_links[]" class="form-control form-control-solid mb-3 mb-lg-0"  value="{{$courseWebLinksValues}}" id="kt_tagify_4"/>
    <!--end::Input-->
</div>
<!--end::Input group-->


<script>
    $(document).ready(function() {
        // Initialize select2 fields
        $('select[data-control="editselect3"]').select2({});
        $('select[data-control="editselect4"]').select2({});
        $('select[data-control="editselect5"]').select2({});

        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        // This function runs when the value of the element with id "c_id" changes
        $("#edit_modal_subject").on("change", function() {
            // Fetch the selected value
            var c_id = $(this).val();

            // Start the AJAX request
            // It retrieves sub-categories based on the fetched category id
            $.ajax({
                url: "/admin-panel/course/editSubject/ajax",
                type: "POST",
                data: {
                    _token: csrfToken,
                    c_id: c_id
                },
                success: function(response) {
                    console.log(response);
                    $("#edit_modal_sub_subject").html(response);
                }
            });

        });

    });
    var input3 = document.querySelector("#kt_tagify_3");
    new Tagify(input3);
    var input4 = document.querySelector("#kt_tagify_4");
    new Tagify(input4);




</script>
