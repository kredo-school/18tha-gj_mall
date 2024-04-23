{{-- If the question is for a seller(Japanese shop), the translator need to translate into English --}}

<link rel="stylesheet" href="{{ asset('css/admin/customerStatus.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="modal fade" id="translate-status-{{ $inquiry->id }}">
    <div class="modal-dialog">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h3 class="modal-title text-light fw-bold mx-auto">
                    Answer Inquiry ID {{ $inquiry->id }}
                </h3>
            </div>

            <form method="POST" action="{{ route('admin.customerSupport.update', $inquiry->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <p class="inquiry-title">Question</p>

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
                        <p class="inquiry-content">{{ $inquiry->content }}</p>
                    </div>

                    {{-- Answer in Japanese --}}
                    <div class="pt-2">
                        <p class="inquiry-title">Answer:</p>
                        <p class="inquiry-content text-break">{{ old('answer',$inquiry->answer) }}</p>
                    </div>

                    <div class="pt-2">
                        <label  class="form-label inquiry-title">Translation:</label>
                        <textarea name="translated_answer" id="translated_answer" rows="5" class="form-control" placeholder="Please write the answer here...">{{ old('translated_answer',$inquiry->translated_answer) }}</textarea>
                    </div>

                    {{-- Status - select the status --}}
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
