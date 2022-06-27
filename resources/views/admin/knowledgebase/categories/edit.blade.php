@extends('layouts.admin')'

@section('title')
    Knowledgebase Categories
@endsection

@section('content-header')
    <h1>Knowledgebase Categories<small>Available categories in the knowledgebase.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li class="active">Knowledgebase</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.knowledgebase.categories.update', $category->id) }}" method="POST">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Update Category</h3>
                    </div>
                    <div class="box-body row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Category Description</label>
                                <textarea class="form-control" id="description" name="description">{{ $category->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                {!! csrf_field() !!}
                {!! method_field('PATCH') !!}
                <button type="submit" class="btn btn-sm btn-primary pull-right">Save</button>
            </form>
            <form action="{{ route('admin.knowledgebase.categories.delete', $category->id) }}" method="POST">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
    <script>
        function MinHeightPlugin(editor) {
            this.editor = editor;
        }

        MinHeightPlugin.prototype.init = function() {
            this.editor.ui.view.editable.extendTemplate({
                attributes: {
                    style: {
                        minHeight: '300px',
                        color: '#000'
                    }
                }
            });
        };

        ClassicEditor.builtinPlugins.push(MinHeightPlugin);
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
