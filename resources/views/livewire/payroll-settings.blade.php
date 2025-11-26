<div>

            <button data-bs-toggle='modal' data-bs-target='#scheduleModal'>Create Daily Schedule</button>
            <br>
            <button data-bs-toggle='modal' data-bs-target='#cutoffperiodModal'>Create Cutoff Period</button>
            <br>
            
           <div>
    <label for="shift" class="form-label">Select Daily Shift</label>
      <select>
        @foreach ($shifts as $shift)
        <pre>{{ $shifts }}</pre>
        <option>{{ $shift->shift_name }}</option>

            
        @endforeach
      </select>
</div>
</div>
