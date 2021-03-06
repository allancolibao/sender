@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="carduser">
                    <div class="content">
                        <div class="header" style="padding-bottom:2vmin;">
                            <h3 class="title">Send files<span><p class="category">We will respond promptly to your queries and concerns.</p></span></h3> 
                        </div>
                        @include('inc.messages')
                        <form role="form" method="post" action="{{ route('send.store') }}"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label> *
                                        <input type="text" class="form-control" name="name" placeholder="Juan Dela Cruz" value="{{ old('name') }}" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">User name</label> *
                                        <input type="text" class="form-control" name="username"  placeholder="IT-JUAN" value="{{ old('username') }}" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label> *
                                        <input type="email" class="form-control" name="email" placeholder="juandelacruz@gmail.com" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Team</label> *
                                                <input type="number" style="any"  class="form-control" name="team" placeholder="99" value="{{ old('team') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Subteam</label> *
                                                <input type="number" style="any"  class="form-control" name="subteam" placeholder="99" value="{{ old('subteam') }}">
                                            </div>
                                       </div>
                                </div>      
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Subject</label> * 
                                        <input type="text" list="eacode_list" class="form-control" name="subject"  id="subject" placeholder="EACODE / Province / Municipality / Barangay" value="{{ old('subject') }}" >
                                        <datalist id="eacode_list" >
                                            @foreach ($json as $value)
                                            <option>{{$value['eacode'].' - '.$value['areaname']}}</option>
                                            @endforeach                                         
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Type of Attachment</label> * 
                                        <select id="type" class="form-control" name="type" value="{{ old('type') }}">   
                                            <option {{ old('type') == '' ? "selected" : "" }} value="">Please select</option>
                                            <option {{ old('type') == 'Anthropometric' ? "selected" : "" }} value="Anthropometric">Anthropometric (NSIS FORMs)</option>
                                            <option {{ old('type') == 'Dietary' ? "selected" : "" }} value="Dietary">Dietary (iDR & NSIS FORMs)</option>
                                            <option {{ old('type') == 'eDCS Backup' ? "selected" : "" }} value="eDCS Backup">eDCS Backup</option> 
                                            <option {{ old('type') == 'Salt Sample' ? "selected" : "" }} value="Salt Sample">Salt Sample Control List</option>
                                            <option {{ old('type') == 'Food Item' ? "selected" : "" }} value="Food Item">Food Item List</option>
                                            <option {{ old('type') == 'Other Concerns' ? "selected" : "" }} value="Other Concerns">Other Concerns</option>                                      
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Message</label> * <span class="text-area">EACODE / Province / Municipality / Barangay / Message</span>
                                        <textarea type="text" rows="10" class="form-control" id="message_text" name="message">{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                       <label><strong>Notes</strong></label>
                                        <a type="text" ><i class="pe-7s-note2"></i></a><br>
                                        <small>1. Please fill up all the required fields (*).</small><br>
                                        <small>2. Click choose file and select single or multiple files with the maximum size of 5mb in total.</small><br>
                                        <small>3. Click send now button.</small><br>
                                        <small>4. Wait for the confimation message appear.</small><br>
                                        <small>5. Notify the designated staff.</small><br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Attach file&nbsp;&nbsp;<i class="pe-7s-paperclip"></i>&nbsp;&nbsp; Max size:5MB &nbsp;&nbsp; File type accepted: jpeg,png,jpg,gif,svg,txt,pdf,ppt,docx,doc,xls,xlsx,zip</label> 
                                        <div id="reminder"></div>
                                        <div id="message"></div>
                                        <input type="file" name="filename[]" class="form-control" id="attachment"  accept="file_extension|image/*|media_type" multiple >
                                    </div>
                                </div>
                            </div>
                            <button type="submit" value="send" id="send" class="btn btn-secondary pull-right add" id="send">Send Now</button>
                            <div class="clearfix"></div>
                        </form>
                        <div id="control" hidden>
                            <div class = "loading">
                                <div class = "blob-1"></div>
                                <div class = "blob-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('inc.versionmodal')
@include('inc.footer')
@endsection

