@extends('layouts.app')

@section('htmlheader_title')
    ShotOut
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <form role="form" action="{{url('shoutout')}}" method="post" enctype="plain">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea type="message" name="message" class="form-control" id="message" placeholder="Message"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-large btn-success">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection