<div class="modal fade" id="editSchedule{{ $schedule->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('schedule.update', $schedule->id) }}" class="modal-content">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title fw-bold">Edit Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-2">
                    <label class="form-label">Mata Pelajaran</label>
                    <input name="subject" class="form-control" value="{{ $schedule->subject }}">
                </div>

                <div class="mb-2">
                    <label class="form-label">Kelas</label>
                    <input name="class" class="form-control" value="{{ $schedule->class }}">
                </div>

                <div class="mb-2">
                    <label class="form-label">Ruangan</label>
                    <input name="room" class="form-control" value="{{ $schedule->room }}">
                </div>

                <div class="mb-2">
                    <label class="form-label">Guru</label>
                    <input name="teacher" class="form-control" value="{{ $schedule->teacher }}">
                </div>

                <div class="row">
                    <div class="col">
                        <label class="form-label">Mulai</label>
                        <input type="time" name="start_time" class="form-control" value="{{ $schedule->start_time }}">
                    </div>
                    <div class="col">
                        <label class="form-label">Selesai</label>
                        <input type="time" name="end_time" class="form-control" value="{{ $schedule->end_time }}">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
