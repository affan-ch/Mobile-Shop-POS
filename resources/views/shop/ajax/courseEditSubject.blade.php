<label for="" class="required form-label">Sub Subject</label>
<select class="form-select form-select-solid" name="sub_subject" data-control="editSelect6" data-dropdown-parent="#edit_modal" data-placeholder="Select a Sub Subject" data-allow-clear="true" required>
    <option></option>
    @foreach ($subSubjects as $subSubject)
        <option value="{{ $subSubject->id }}">{{ $subSubject->sc_name }}</option>
    @endforeach
</select>
<script>
    $(document).ready(function() {
        // Initialize select2 fields
        $('select[data-control="editSelect6"]').select2({
            // Specify your select2 options here
        });
    });
</script>
