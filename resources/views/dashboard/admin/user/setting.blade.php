<form action="/admin/lapangan/edit/{{ $court->id_court }}" method="post" class="max-w-xl mt-10 space-y-5">
    @method('put')
    @csrf
    <div>
        <label for="name_court" class="block mb-2 text-sm font-medium text-slate-900">Nama Lapangan</label>
        <input type="text" id="name_court" name="name_court"
            class="block w-full p-2 text-slate-900 border border-slate-500 rounded-lg bg-white text-xs focus:ring-slate-500 focus:border-slate-500"
            value="{{ old('name_court', $court->name_court) }}">
    </div>
    <div>
        <label for="price_court" class="block mb-2 text-sm font-medium text-slate-900">Harga Lapangan</label>
        <input type="number" id="price_court" name="price_court"
            class="block w-full p-2 text-slate-900 border border-slate-500 rounded-lg bg-white text-xs focus:ring-slate-500 focus:border-slate-500"
            value="{{ old('price_court', $court->price_court) }}">
    </div>
    <div class="flex gap-2">
        <button
            class="flex justify-center items-center gap-1 text-sm px-2 py-2 h-max bg-slate-700 text-slate-100 border border-gray-200 rounded-lg shadow hover:bg-slate-600">
            <p class="font-semibold">Edit</p>
        </button>
        <a href="/admin/booking/tambah"
            class="flex justify-center items-center gap-1 text-sm px-5 py-2 h-max bg-slate-100 text-slate-700 border border-gray-200 rounded-lg shadow hover:bg-slate-200">
            <p class="font-semibold">Batal</p>
        </a>
    </div>
</form>
