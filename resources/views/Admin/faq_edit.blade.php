@extends('Admin.layout.app')
@section('title-content','Edit Faq')
@section('right_top_button')
<a href="{{ route('admin_faq_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Faq</a>
@endsection
@section('body')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_faq_update',$faq->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Question *</label>
                                        <input type="text" class="form-control" name="question" value="{{ $faq->question }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Answer *</label>
                                        <textarea name="answer" class="form-control snote" cols="30" rows="10" >{{ $faq->answer }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection