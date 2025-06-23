<label for="" class="required form-label">Sub Subject</label>
<select class="form-select form-select-solid" name="sub_subject" data-control="addSelect2" data-dropdown-parent="#add_modal" data-placeholder="Select a Sub Subject" data-allow-clear="true" required>
    <option></option>
    @foreach ($subSubjects as $subSubject)
        <option value="{{ $subSubject->id }}">{{ $subSubject->sc_name }}</option>
    @endforeach
</select>
<script>
    $(document).ready(function() {
        // Initialize select2 fields
        $('select[data-control="addSelect2"]').select2({
            // Specify your select2 options here
        });
    });
</script>
