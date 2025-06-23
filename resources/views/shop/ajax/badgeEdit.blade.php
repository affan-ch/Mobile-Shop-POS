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
    <input type="text" name="title" class="form-control form-control-solid mb-3 mb-lg-0" value="{{$badge->title}}" placeholder="Name" required />
    <!--end::Input-->
</div>
<!--end::Input group-->

<!--end::Input group-->
<div class="mb-7">
    <label for="" class="form-label">Type</label>
    <select class="form-select form-select-solid" onchange="edit_modal_handleTypeChange(this)" name="badge" data-control="editselect2" data-dropdown-parent="#edit_modal" data-placeholder="Select a Type" data-allow-clear="true" required>
        <option value=""></option>
        <option value="1" @if ($badge->type ==1) selected @endif>Courses Specific</option>
        <option value="2" @if ($badge->type ==2) selected @endif>Subject Specific</option>
        <option value="3" @if ($badge->type ==3) selected @endif>Sub Subject Specific</option>
    </select>
</div>

<div class="mb-7" id="edit_modal_courses"  style="@if ($badge->type == 2 || $badge->type == 3) display: none; @endif">
    <label for="" class="form-label">Courses</label>
    <select class="form-select form-select-solid" name="courses[]" data-control="editselect2" data-dropdown-parent="#edit_modal" data-placeholder="Select a Course" data-allow-clear="true" multiple >
        <option></option>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}" @if (in_array($course->id, $badgeCourses)) selected @endif>{{ $course->title }}</option>
        @endforeach
    </select>
</div>


<div class="row justify-content-between">

    <div class="mb-7 col-lg-8" id="edit_modal_subject" style="@if ($badge->type == 1 || $badge->type == 3) display: none; @endif">
        <label for="" class="form-label">Subjects</label>
        <select class="form-select form-select-solid" name="subject" data-control="editselect2" data-dropdown-parent="#edit_modal" data-placeholder="Select a Subject" data-allow-clear="true" >
            <option></option>
            @foreach ($Subjects as $Subject)
                <option value="{{ $Subject->id }}" @if ($Subject->id == $badge->category_id) selected @endif>{{ $Subject->c_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-7 col-lg-8" id="edit_modal_subSubject" style="@if ($badge->type ==1 || $badge->type ==2 ) display: none; @endif">
        <label for="" class="form-label">Sub Subjects</label>
        <select class="form-select form-select-solid" name="subSubject"  data-control="editselect2" data-dropdown-parent="#edit_modal" data-placeholder="Select a Sub Subject" data-allow-clear="true" >
            <option></option>
            @foreach ($SubSubjects as $SubSubject)
                <option value="{{ $SubSubject->id }}"  @if ($SubSubject->id == $badge->sub_category_id) selected @endif>{{ $SubSubject->sc_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="fv-row mb-7 col-lg-4 @if ($badge->type ==1 ) d-none @endif"  id="edit_modal_quizzes">
        <!--begin::Label-->
        <label class="required fw-bold fs-6 mb-2">No. Of Courses</label>
        <!--end::Label-->
        <!--begin::Input-->
        <!--begin::Dialer-->
        <div class="position-relative w-100" id="kt_dialer_example_2">
            <!--begin::Decrease control-->
            <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                <i class="fas fa-minus-square fs-2"><span class="path1"></span><span class="path2"></span></i>
            </button>
            <!--end::Decrease control-->

            <!--begin::Input control-->
            <input type="text" class="form-control form-control-solid w-100 ps-12" data-kt-dialer-control="input" name="course_count" readonly value="@if ($badge->type == 2 || $badge->type == 3 ) {{$badge->courses_count}} @endif" />
            <!--end::Input control-->

            <!--begin::Increase control-->
            <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
                <i class="fas fa-plus-square fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </button>
            <!--end::Increase control-->
        </div>
        <!--end::Dialer-->
        <!--end::Input-->
    </div>
</div>

<!--begin::Input group-->
<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">Description</label>
    <!--end::Label-->
    <!--begin::Input-->
    <textarea class="form-control form-control-solid mb-3 mb-lg-0" id="add_description" name="description">{{$badge->description}}</textarea>
    <!--end::Input-->
</div>
<!--end::Input group-->
<script>
    $(document).ready(function() {
        // Initialize select2 fields
        $('select[data-control="editselect2"]').select2({
            // Specify your select2 options here
        });
        // Dialer container element
        var dialerElement = document.querySelector("#kt_dialer_example_2");

        // Create dialer object and initialize a new instance
        var dialerObject = new KTDialer(dialerElement, {
            min: 1,
            max: 25,
            step: 1,
            prefix: "",
            decimals: 0
        });
    });
</script>


<script>
    // Function to handle the change event
    function edit_modal_handleTypeChange(selectElement) {
        const selectedValue = selectElement.value;

        // Hide all dropdowns by default
        $('#edit_modal_courses, #edit_modal_subject, #edit_modal_subSubject, #edit_modal_quizzes').hide();

        // Show the relevant dropdown based on the selected value
        if (selectedValue === '1') {
            $('#edit_modal_courses').show().val('').trigger('change.select2');
        } else if (selectedValue === '2') {
            $('#edit_modal_subject').show().val('').trigger('change.select2');
            $('#edit_modal_quizzes').show();
        } else if (selectedValue === '3') {
            $('#edit_modal_subSubject').show().val('').trigger('change.select2');
            $('#edit_modal_quizzes').show();
        }
    }
</script>

