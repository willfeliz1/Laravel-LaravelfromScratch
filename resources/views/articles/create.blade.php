@extends('layout')

@section('head')
@endsection

@section('content')
    <div id=wrapper>
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold">New Article</h1>

            <form method="POST" action="/articles">
            @csrf
                <div class="field">
                    <label class="label" for="title">Title</label>

                    <div class="control">
                        <input class="input @error('title') is-danger @enderror" type="text"  name="title" id="title" value="{{ old('title') }}">

                        @error('title')
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @enderror    
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="excerpt">Excerpt</label>

                    <div class="control">
                        <textarea class="textarea @error('excerpt') is-danger @enderror" name="excerpt" id="excerpt"></textarea>
                    </div>

                    @error('title')
                            <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                    @enderror  
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea class="textarea @error('body') is-danger @enderror" name="body" id="body"></textarea>
                    </div>

                    @error('body')
                            <p class="help is-danger">{{ $errors->first('body') }}</p>
                    @enderror  
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection