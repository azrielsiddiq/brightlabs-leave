<section>
    <style>
        .password-card-wrapper {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .password-card-wrapper .card {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(100, 116, 139, 0.08);
        }

        .password-card-wrapper h5 {
            color: #0f172a;
            font-weight: 700;
        }

        .password-card-wrapper .text-muted-custom {
            color: #64748b;
            font-size: 13px;
        }

        .password-card-wrapper .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 6px;
        }

        .password-card-wrapper .input-group-custom {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-card-wrapper .input-group-custom i {
            position: absolute;
            right: 14px;
            color: #94a3b8;
            font-size: 15px;
            pointer-events: none;
        }

        .password-card-wrapper .form-control-modern {
            width: 100%;
            padding: 12px 40px 12px 14px;
            font-size: 14px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            background-color: #f8fafc;
            color: #0f172a;
            transition: all 0.2s;
        }

        .password-card-wrapper .form-control-modern:focus {
            outline: none;
            border-color: #94a3b8;
            box-shadow: 0 0 0 3px rgba(148, 163, 184, 0.2);
        }

        .password-card-wrapper .form-control-modern.is-invalid {
            border-color: #ef4444;
            background-color: #fef2f2;
        }

        .password-card-wrapper .btn-primary-modern {
            background: #64748b;
            color: #fff;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            border: none;
            transition: all 0.2s;
            cursor: pointer;
        }

        .password-card-wrapper .btn-primary-modern:hover {
            background: #475569;
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(71, 85, 105, 0.25);
        }

        .password-card-wrapper .status-alert {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 13px;
        }

        .password-card-wrapper .text-danger-modern {
            color: #ef4444;
            font-size: 12px;
        }
    </style>

    <div class="password-card-wrapper">
        <div class="card border-0 mb-4">
            <div class="card-body p-4">
                <header class="mb-4">
                    <h5 class="mb-1">Ubah Kata Sandi</h5>
                    <p class="text-muted-custom mb-0">Pastikan akun Anda menggunakan kata sandi yang kuat dan belum pernah dipakai di tempat lain.</p>
                </header>

                @if (session('status') === 'password-updated')
                    <div class="status-alert mb-3" id="password-updated-message">
                        <i class="fa-solid fa-circle-check me-1"></i> Kata sandi berhasil diperbarui.
                    </div>
                @endif

                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <!-- Kata Sandi Saat Ini -->
                    <div class="mb-3">
                        <label for="update_password_current_password" class="form-label">Kata Sandi Saat Ini</label>
                        <div class="input-group-custom">
                            <input id="update_password_current_password" name="current_password" type="password"
                                   class="form-control-modern @if($errors->updatePassword->has('current_password')) is-invalid @endif"
                                   placeholder="Masukan kata sandi saat ini" autocomplete="current-password">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        @if ($errors->updatePassword->has('current_password'))
                            <div class="text-danger-modern mt-2">
                                <i class="fa-solid fa-circle-exclamation me-1"></i> {{ $errors->updatePassword->first('current_password') }}
                            </div>
                        @endif
                    </div>

                    <!-- Kata Sandi Baru -->
                    <div class="mb-3">
                        <label for="update_password_password" class="form-label">Kata Sandi Baru</label>
                        <div class="input-group-custom">
                            <input id="update_password_password" name="password" type="password"
                                   class="form-control-modern @if($errors->updatePassword->has('password')) is-invalid @endif"
                                   placeholder="Masukan kata sandi baru" autocomplete="new-password">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        @if ($errors->updatePassword->has('password'))
                            <div class="text-danger-modern mt-2">
                                <i class="fa-solid fa-circle-exclamation me-1"></i> {{ $errors->updatePassword->first('password') }}
                            </div>
                        @endif
                    </div>

                    <!-- Konfirmasi Kata Sandi Baru -->
                    <div class="mb-4">
                        <label for="update_password_password_confirmation" class="form-label">Konfirmasi Kata Sandi Baru</label>
                        <div class="input-group-custom">
                            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                                   class="form-control-modern @if($errors->updatePassword->has('password_confirmation')) is-invalid @endif"
                                   placeholder="Ulangi kata sandi baru" autocomplete="new-password">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        @if ($errors->updatePassword->has('password_confirmation'))
                            <div class="text-danger-modern mt-2">
                                <i class="fa-solid fa-circle-exclamation me-1"></i> {{ $errors->updatePassword->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn-primary-modern" style="width: auto; padding: 10px 24px;">
                        <i class="fa-solid fa-key me-1"></i> Simpan Kata Sandi
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const msg = document.getElementById('password-updated-message');
        if (msg) {
            setTimeout(() => {
                msg.style.transition = 'opacity 0.3s ease';
                msg.style.opacity = '0';
                setTimeout(() => msg.remove(), 300);
            }, 2000);
        }
    });
</script>