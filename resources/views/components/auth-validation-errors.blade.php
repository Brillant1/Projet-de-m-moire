@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
      

        <div class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif
