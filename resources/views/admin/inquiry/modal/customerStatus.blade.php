{{-- Change Status --}}
<link rel="stylesheet" href="{{ asset('css/admin/customerStatus.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade" id="change-status-{{$inquiry->id}}">
    <div class="modal-dialog">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h3 class="modal-title text-light fw-bold mx-auto">
                    Answer Inquiry ID {{$inquiry->id}}
                </h3>
            </div>

            <form method="POST" action="{{ route('admin.customerSupport.update', $inquiry->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <p class="question fw-bold">Question</p>

                    <div class="pt-2">
                        <p class="inquiry-title">Title:</p>
                        <p class="inquiry-content">{{ $inquiry->title }}</p>
                    </div>

                    <div class="pt-2">
                        <p class="inquiry-title">Inquiry Category:</p>
                        <p class="inquiry-content">{{ $inquiry->inquiryGenre->name }}</p>
                    </div>

                    <div class="pt-2">
                        <p class="inquiry-title">Content:</p>
                        <p class="inquiry-content text-break">{{ $inquiry->content }}</p>
                    </div>

                    <div class="pt-2">
                        {{-- css - style.css --}}
                        <label class="form-label inquiry-title">Answer:</label>
                        <textarea name="answer" id="answer" rows="5" class="form-control" placeholder="Please write the answer here..."></textarea>
                    </div>

                    <div class="status pt-2">
                        <label class="inquiry-title">Status:</label><br>
                        <select name="inquiry_status_id" id="inquiry_status_id" class="inquiry-content form-control">
                            <option hidden>{{ old('inquiry_status_id', $inquiry->inquiry_status_id) }}</option>
                            <option value="1">1: Unsolved</option>
                            <option value="2">2: Answer</option>
                            <option value="3">3: Solved</option>
                        </select>
                    </div>
                </div>             
                <div class="modal-footer border-0 mx-auto montserrat">
                        <button type="button" class="btn btn-sm cancel-answer-button shadow mx-auto" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-sm complete-answer-button shadow mx-auto">Complete</button>
                </div>
            </form>
        </div>
    </div>
</div>
