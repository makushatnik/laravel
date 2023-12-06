@props(['post' => '', 'btn_title' => ''])

<x-form {{ $attributes }}>
    <x-form-item>
        <x-label required>{{ __('Title') }}</x-label>
        <x-input name="title" value="{{ $post->title ?? '' }}" autofocus/>
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __('Content') }}</x-label>
        <x-trix name="content" value="{{ $post->content ?? '' }}"/>
    </x-form-item>

    <x-button type="submit">{{ __($btn_title) }}</x-button>
</x-form>