@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Student Information</h5>
                <dl class="row">
                    @foreach($info->getAttributes() as $k => $v)
                        <dt class="col-sm-3">@description($k)</dt>
                        @if($k === 'signature')
                            <input id="inputSignature" class="d-none" value="{{$v}}"/>
                            <dd class="col-sm-9">
                                <div id="decodeSignature"></div>
                            </dd>
                            @continue;
                        @endif
                        <dd class="col-sm-9">{{$v}}</dd>
                    @endforeach
                </dl>
            </div>
            <div class="card-body">
                <h5 class="card-title">Emergency Contacts List</h5>
                @foreach($info->contactList()->get() as $contact)
                    <dl class="row">
                        @foreach($contact->getAttributes() as $k => $v)
                            @php
                                if (in_array($k, ['id', 'info_id'])) {
                                    continue;
                                }
                            @endphp
                            <dt class="col-sm-3">@description($k)</dt>
                            <dd class="col-sm-9">{{$v}}</dd>
                        @endforeach
                    </dl>
                @endforeach
            </div>
            <div class="card-body">
                <h5 class="card-title">Physicians</h5>
                @foreach($info->physicians()->get() as $physician)
                    <dl class="row">
                        @foreach($physician->getAttributes() as $k => $v)
                            @php
                                if (in_array($k, ['id', 'info_id'])) {
                                    continue;
                                }
                            @endphp
                            <dt class="col-sm-3">@description($k)</dt>
                            <dd class="col-sm-9">{{$v}}</dd>
                        @endforeach
                    </dl>
                @endforeach
            </div>
            <div class="card-body">
                <h5 class="card-title">Additional Individuals That May Pick Up Your Child</h5>
                @foreach($info->additionalIndividuals()->get() as $additionalIndividual)
                    <dl class="row">
                        @foreach($additionalIndividual->getAttributes() as $k => $v)
                            @php
                                if (in_array($k, ['id', 'info_id'])) {
                                    continue;
                                }
                            @endphp
                            <dt class="col-sm-3">@description($k)</dt>
                            <dd class="col-sm-9">{{$v}}</dd>
                        @endforeach
                    </dl>
                @endforeach
            </div>
        </div>
    </div>

@endsection