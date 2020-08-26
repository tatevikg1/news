@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 20px;">
    <div class="justify-content-center">
    <?php foreach ($staff as $reporter): ?>
        <div class="card-header m-5">

            @if ($reporter->role==0)
            <h5><i>Editor</i></h5>
            @else
                <h5><i>Reporter</i></h5>
            @endif


            <div class="">
                <i>Reporters name:</i>
                <strong>{{ $reporter->name }}</strong>
            </div>

            <div class="">
                <i>Works since:</i>
                <strong> {{ $reporter->created_at->format('jS F Y ') }}</strong>
            </div>

            <div class="">
                <i>Contact info:</i>
                <strong> E-mail : {{ $reporter->email }}</strong>
            </div>

            <div class="">
                <i>Biography:</i>
                <p>
                    ********* ************* ******* *********** *  ************* *    * **** ****
                    ***** ********* ************* ** ******* ********** ******* ******* ******* *
                    ********* * *  *     ********* ***** ******** *** ***** **** ******** **** * ***
                    ***** ****** ********* ********** ******** *** ********* ***.
                </p>
            </div>




        </div>
    <?php endforeach; ?>
    </div>
</div>
@endsection
