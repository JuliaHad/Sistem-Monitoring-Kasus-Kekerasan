@extends('layouts.admin')

@section('content')

<div style="margin-bottom: 25px;">

    <h1 style="
        margin: 0;
        font-size: 28px;
        font-weight: 700;
        color: #1e293b;
    ">
        Tambah Pengguna
    </h1>

    <p style="
        margin-top: 8px;
        color: #64748b;
        font-size: 14px;
    ">
        Tambahkan pengguna baru dan tentukan hak aksesnya.
    </p>

</div>


@if($errors->any())

    <div style="
        margin-bottom: 20px;
        padding: 14px 18px;
        background: #fee2e2;
        border: 1px solid #fecaca;
        color: #b91c1c;
        border-radius: 10px;
        font-size: 14px;
    ">

        <strong>Terjadi kesalahan:</strong>

        <ul style="
            margin: 8px 0 0 20px;
            padding: 0;
        ">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<div style="
    background: white;
    border-radius: 14px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.06);
    max-width: 850px;
">

    <form method="POST" action="{{ route('admin.pengguna.store') }}">

        @csrf


        {{-- NAMA --}}

        <div style="margin-bottom: 20px;">

            <label style="
                display: block;
                margin-bottom: 8px;
                font-size: 14px;
                font-weight: 600;
                color: #334155;
            ">
                Nama
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Masukkan nama pengguna"
                required
                style="
                    width: 100%;
                    box-sizing: border-box;
                    padding: 12px 14px;
                    border: 1px solid #cbd5e1;
                    border-radius: 8px;
                    font-size: 14px;
                    outline: none;
                "
            >

        </div>


        {{-- EMAIL --}}

        <div style="margin-bottom: 20px;">

            <label style="
                display: block;
                margin-bottom: 8px;
                font-size: 14px;
                font-weight: 600;
                color: #334155;
            ">
                Email
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email pengguna"
                required
                style="
                    width: 100%;
                    box-sizing: border-box;
                    padding: 12px 14px;
                    border: 1px solid #cbd5e1;
                    border-radius: 8px;
                    font-size: 14px;
                    outline: none;
                "
            >

        </div>


        {{-- PASSWORD --}}

        <div style="margin-bottom: 20px;">

            <label style="
                display: block;
                margin-bottom: 8px;
                font-size: 14px;
                font-weight: 600;
                color: #334155;
            ">
                Password
            </label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan password minimal 8 karakter"
                required
                style="
                    width: 100%;
                    box-sizing: border-box;
                    padding: 12px 14px;
                    border: 1px solid #cbd5e1;
                    border-radius: 8px;
                    font-size: 14px;
                    outline: none;
                "
            >

        </div>


        {{-- ROLE --}}

        <div style="margin-bottom: 25px;">

            <label style="
                display: block;
                margin-bottom: 8px;
                font-size: 14px;
                font-weight: 600;
                color: #334155;
            ">
                Role
            </label>

            <select
                name="role"
                required
                style="
                    width: 100%;
                    box-sizing: border-box;
                    padding: 12px 14px;
                    border: 1px solid #cbd5e1;
                    border-radius: 8px;
                    font-size: 14px;
                    background: white;
                    color: #334155;
                "
            >

                <option value="">
                    -- Pilih Role --
                </option>

                <option value="user"
                    {{ old('role') === 'user' ? 'selected' : '' }}>
                    User
                </option>

                <option value="operator"
                    {{ old('role') === 'operator' ? 'selected' : '' }}>
                    Operator
                </option>

                <option value="admin"
                    {{ old('role') === 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

            </select>

        </div>


        {{-- TOMBOL --}}

        <div style="
            display: flex;
            gap: 10px;
        ">

            <button
                type="submit"
                style="
                    border: none;
                    padding: 11px 20px;
                    background: #2563eb;
                    color: white;
                    border-radius: 8px;
                    font-size: 14px;
                    font-weight: 600;
                    cursor: pointer;
                "
            >
                Simpan Pengguna
            </button>


            <a
                href="{{ route('admin.pengguna') }}"
                style="
                    display: inline-block;
                    padding: 11px 20px;
                    background: #e2e8f0;
                    color: #334155;
                    border-radius: 8px;
                    text-decoration: none;
                    font-size: 14px;
                    font-weight: 600;
                "
            >
                Batal
            </a>

        </div>

    </form>

</div>

@endsection