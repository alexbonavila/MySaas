@extends('layouts.app')
@section('htmlheader_title')
    Create Invoice
@endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-xs-10">
                <h1>Hello world</h1>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
                <script type="text/javascript">
                    var pdf = new jsPDF();
                    pdf.text(30, 30, 'Hello world!');
                    pdf.save('hello_world.pdf');
                </script>
            </div>
        </div>
    </div>
@endsection