@extends('layouts.app')

@section('content')

<style type="text/css">
    .form-check-label{
        padding-left: 3.25rem;
    }
</style>

<div id="page-wrapper" style="min-height: 257px;">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Blogs</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="active">Blogs</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row white-box">
                <div class="col-lg-12">
                    @include('layouts.flash_message')                
                </div>    
                <div class="col-lg-12">

                    <button type="button" class="btn btn-primary m-b-10 pull-right" data-toggle="modal" data-target="#add-modal">Add</button>
                    
                </div>
                <div class="col-md-6"></div>
                
                <div class="col-md-3">
                    <div class="mb-3 input-group">
                        <input type="text" name="search" class="form-control search" id="filter_search" placeholder="Search...">
                    </div>
                </div>            
                <div class="col-lg-12">                
                    <div class="table-responsive">
                        <table id="listTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Tags</th>
                                    {{-- <th>Created By</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>        
        </div>
    </div>

    @endsection

    @section('modal')
    <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"><!-- modal-lg -->
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Blog</h4> 
                </div>

                <form id="add-form" method="post" action="#" autocomplete="nope">
                    @csrf
                    <div class="modal-body">
                        <div id="add_error_message"></div>

                        <div class="form-group row">
                            <div class="col-md-6 form-input">
                                <label for="coin_name" class="control-label">Title:</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control title" id="title" name="title" value="">
                                <span class="error"></span>
                            </div>                                        
                            <div class="col-md-6 form-input">
                                <label for="logo" class="control-label">Image:</label>
                                <span class="text-danger">*</span>
                                <input type="file" class="form-control image" id="image" name="image" value=""></span>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 form-input">
                                <label for="website_url" class="control-label">Short Description:</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control short_description" id="short_description" name="short_description" value="">
                                <span class="error"></span>
                            </div>
                            <div class="col-md-6 form-input">
                                <label for="contract_address" class="control-label">Tags:</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control tags" data-role="taginput" id="tags" name="tags" value="">
                                <span class="error"></span>
                            </div>                          
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 form-input">
                                <label for="long_description" class="control-label">Long description:</label>
                                {{-- <textarea class="form-control long_description" rows="7" id="long_description" name="long_description"></textarea> --}}
                                <div class="long_description" id="long_description"></div>
                                <span class="error"></span>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer" style="margin-top: 75px;">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit Blog</h4> 
                </div>

                <form id="edit-form" method="post" action="#" autocomplete="nope">

                    @csrf

                    <div class="modal-body">

                        <div id="edit_error_message"></div>

                        <input type="hidden" name="id" id="update-id">

                        <div class="form-group row">
                            <div class="col-md-6 form-input">
                                <label for="coin_name" class="control-label">Title:</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control title" id="title" name="title" value="">
                                <span class="error"></span>
                            </div>                                        
                            <div class="col-md-6 form-input">
                                <label for="logo" class="control-label">Image:</label>
                                <span class="text-danger">*</span>
                                <input type="file" class="form-control image" id="image" name="image" value=""></span>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 form-input">
                                <label for="website_url" class="control-label">Short Description:</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control short_description" id="short_description" name="short_description" value="">
                                <span class="error"></span>
                            </div>
                            <div class="col-md-6 form-input">
                                <label for="contract_address" class="control-label">Tags:</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control edit_tags" data-role="taginput" id="edit_tags" name="edit_tags" value="">
                                <span class="error"></span>
                            </div>                          
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 form-input">
                                <label for="long_description" class="control-label">Long description:</label>
                                {{-- <textarea class="form-control long_description" rows="7" id="long_description" name="long_description"></textarea> --}}
                                <div class="edit_long_description" id="edit_long_description"></div>
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="modal-footer" style="margin-top: 75px;">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    
    @endsection

    @section('js')

    <script type="text/javascript">

        $(document).ready(function() {

            $('.tags').tagsinput({allowDuplicates:false});
            $('.edit_tags').tagsinput({allowDuplicates:false});

            var msgElement = $('#add_error_message');
            var editmsgElement = $('#edit_error_message');  

            var apiUrl = "{{ route('blogs.list') }}";
            var addUrl = "{{ route('blogs.store') }}";
            var detailUrl = "{{ route('blogs.detail') }}";
            var updateUrl = "{{ route('blogs.update') }}";
            var deleteUrl = "{{ route('blogs.delete') }}";

            var toolbarOptions = [
                  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                  ['blockquote', 'code-block'],

                  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                  [{ 'direction': 'rtl' }],                         // text direction

                  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

                  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                  [{ 'font': [] }],
                  [{ 'align': [] }],

                  ['clean'],
                  ['image','video']                                      // remove formatting button
                  ];

                  var quill = new Quill('.long_description', {
                    modules: {
                        toolbar: toolbarOptions
                    },
                    theme: 'snow'
                });

                  var edit_quill = new Quill('.edit_long_description', {
                    modules: {
                        toolbar: toolbarOptions
                    },
                    theme: 'snow'
                });

                  var listTable = $('#listTable').DataTable({
                    searching: false,
                    paging: false, 
                    info: true,
                // order: [ 5, 'asc' ],
                pageLength: 25,
                processing: true,
                serverSide: true,
                ajax: {
                    url: apiUrl,
                    type: 'GET',
                    data: function (d) {
                        d.search = $('#filter_search').val()                    
                    },
                    headers: {
                        'X-XSRF-TOKEN': $('meta[name=csrf-token]').attr('content'),
                    },
                },
                columns: [
                { data: 'title', name:"title" },
                {
                    name: 'image',
                    sortable: false,
                    render: function(_,_, value) {
                        return '<img src="'+value['image_url']+'"  width="60" height="50"/>';
                    }
                },
                { data: 'short_description',name:"short_description" },
                { data: 'tags',name:"tags" },
                // { data: 'user_name', name:"user_name" },
                {
                    sortable: false,
                    render: function(_,_, full) {
                        var contactId = full['id'];
                        var actions ="";
                        if(contactId){
                            actions = '&nbsp<a href="javascript:void(0)" data-id="'+ contactId +'" class="btn-sm btn-primary edit-row" data-toggle="modal" data-target="#edit-modal">Edit</a>';
                            actions += '&nbsp<a href="javascript:void(0)" data-id="'+ contactId +'" class="btn-sm btn-danger delete">Delete</a>';                            
                            
                        }
                        return actions;
                    },
                },
                ],
                "drawCallback": function( settings ) {
                }
            });

                  $('body').on("keyup change", "#filter_search, #filter_status", function(e){
                     listTable.draw();
                 });

                  $('#add-form').submit(function(event) {
                    event.preventDefault();
                    var $this = $(this);
                    var dataString = new FormData($('#add-form')[0]);
                    var image = $('#add-form #image')[0].files.length;
                    if(image){
                        dataString.append('image', $('#add-form #image')[0].files);
                    }
                    dataString.append('long_description', document.getElementById("long_description").innerHTML);
                    var myEditor = document.querySelector('#long_description')
                    dataString.append('long_description',myEditor.children[0].innerHTML);

                    $.ajax({
                        url: addUrl,
                        type: 'POST',
                        data: dataString,
                        cache:false,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $($this).find('button[type="submit"]').prop('disabled', true);
                        },
                        success: function(result) {
                            $($this).find('button[type="submit"]').prop('disabled', false);
                            if (result.status == true) {
                                $this[0].reset();
                                $('#add-modal').modal('hide');
                                window.scrollTo({ top: 0, behavior: 'smooth' });
                                showFlash("#flash-message", result.message, 'success');
                                $('#listTable').DataTable().ajax.reload();                        
                                $('.error').html("");
                        // editor.setData('');
                        window.setTimeout(function() {
                            location.reload(true);
                        }, 2000);
                    } 
                    else if(result.status == false && result.validationError == true)
                    {
                        showFlash(msgElement, result.message, 'error');   
                    } else {
                        first_input = "";
                        $('.error').html("");
                        $.each(result.message, function(key) {
                            if(first_input==""){first_input=key};
                            if(key=="social_media"){
                                $('.social_media_err').html(result.message[key]);
                            }else{
                                $('.'+key).closest('.form-input').find('.error').html(result.message[key]);
                            }
                        });
                        $('#add-form').find("."+first_input).focus();
                    }
                },
                error: function(error) {
                    $($this).find('button[type="submit"]').prop('disabled', false);
                    alert('Something went wrong!', 'error');
                    // location.reload();
                }
            });
                });

                  $('body').on('click','.edit-row',function(event) {
                    var id = $(this).attr('data-id');            
                    $('#update-id').val(id);            
                    $('#edit-form .logo_div').hide();
                    
                    $.ajax({
                        url: detailUrl+'?id='+id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(result) {
                            if(result.status){      
                                console.log(result.detail.tags);                      
                                $('#edit-form').find('#title').val(result.detail.title);
                                $('#edit-form').find('#short_description').val(result.detail.short_description);
                                $('#edit_tags').tagsinput('add',result.detail.tags);
                                edit_quill.root.innerHTML = result.detail.long_description; 

                            }else{
                                showFlash(editmsgElement, result.message, 'error');
                                setTimeout(function() {
                                    $('#edit-modal').modal('hide');
                                }, 1500);
                                $('.error').html("");
                            }
                        }
                    });
                });


                  $('#edit-form').submit(function(event) {
                    event.preventDefault();

                    var $this = $(this);
                    var dataString = new FormData($('#edit-form')[0]);
                    var image = $('#edit-form #image')[0].files.length;
                    var myEditor = document.querySelector('#edit_long_description')
                    dataString.append('edit_long_description',myEditor.children[0].innerHTML);
                    if(image){
                        dataString.append('image', $('#edit-form #image')[0].files);
                    }
                    $.ajax({
                        url: updateUrl,
                        type: 'POST',
                        data: dataString,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            $($this).find('button[type="submit"]').prop('disabled', true);
                        },
                        success: function(result) {
                            $($this).find('button[type="submit"]').prop('disabled', false);
                            if (result.status == true) {
                                $this[0].reset();
                                $('#edit-modal').modal('hide');
                                window.scrollTo({ top: 0, behavior: 'smooth' });
                                showFlash("#flash-message", result.message, 'success');
                                $('#listTable').DataTable().ajax.reload();                        
                                $('.error').html("");
                                window.setTimeout(function() {
                                    location.reload(true);
                                }, 2000);
                            }
                            else if(result.status == false && result.validationError == true)
                            {
                                showFlash(editmsgElement, result.message, 'error');   
                            }else {
                                first_input = "";
                                $('.error').html("");
                                $.each(result.message, function(key) {
                                    if(first_input=="") first_input=key;
                                    $('#edit-form').find('.'+key).closest('.form-input').find('.error').html(result.message[key]);
                                });
                                $('#edit-form').find("."+first_input).focus();
                            }
                        },
                        error: function(error) {
                            $($this).find('button[type="submit"]').prop('disabled', false);
                            alert('Something want wrong!', 'error');
                    // location.reload();
                }
            });
                });

                  $('body').on('click','.delete',function(event) {
                    var id = $(this).attr('data-id');
                    if(confirm('Are you sure want to delete?')){
                        $.ajax({
                            url: deleteUrl+'?id='+id,
                            type: 'POST',
                            dataType: 'json',
                            success: function(result) {
                                element = $('#flash-message');
                                showFlash(element, result.message, 'success');
                                $('#listTable').DataTable().ajax.reload();

                            }
                        });    
                    }

                });

              });

          </script>

          @endsection