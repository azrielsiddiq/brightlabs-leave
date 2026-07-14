<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    

    <style>
        body {
            background: #f4f7fc !important;
        }
        .text-navy-dark {
            color: #1e2640 !important;
        }
        .text-muted-cool {
            color: #7a889f !important;
        }
        .dashboard-card-soft {
            background: #ffffff;
            border: none !important;
            border-radius: 16px !important;
            box-shadow: 0 4px 20px rgba(163, 177, 198, 0.12) !important;
            padding: 24px;
        }
        .announcement-card-soft {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(163, 177, 198, 0.06);
            transition: all 0.2s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 24px;
            height: 100%;
        }
        .announcement-card-soft:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(163, 177, 198, 0.14);
            border-color: #cbd5e1;
        }
        .announcement-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }
        .announcement-title {
            font-size: 16px;
            font-weight: 700;
            color: #1e2640;
            line-height: 1.4;
        }
        .announcement-content {
            font-size: 14px;
            color: #475569;
            line-height: 1.6;
        }
        .user-meta-badge {
            background-color: #f1f5f9;
            color: #334155;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.75rem;
        }
        .title-indicator {
            width: 4px;
            height: 20px;
            background-color: #2563eb;
            border-radius: 2px;
            flex-shrink: 0;
        }
    </style>

    <div class="container-fluid py-4 px-4 mx-auto" style="max-width: 1300px;">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex align-items-center gap-2 mb-4">
                    <div class="title-indicator"></div>
                    <h4 class="fs-5 fw-bold text-navy-dark mb-0 ml-2">Daftar Pengumuman</h4>
                </div>
                
                <div class="row g-4">
                    @forelse($pengumuman as $item)
                        <div class="col-12 col-md-6 col-xl-4 mb-4">
                            <div class="announcement-card-soft">
                                <div>
                                    <div class="d-flex flex-column justify-content-between align-items-start gap-3 mb-3">
                                        <div class="d-flex gap-3 align-items-start w-100 justify-content-between">
                                            <div class="d-flex gap-2 align-items-start">
                                                <div class="announcement-icon me-1">
                                                    <i class="fa-solid fa-bullhorn"></i>
                                                </div>
                                                <div>
                                                    <h5 class="announcement-title mb-1 ml-2">
                                                        {{ $item->judul }}
                                                    </h5>
                                                    <div class="d-flex flex-wrap align-items-center gap-2 text-muted-cool ml-2"
                                                        style="font-size: 0.75rem;">
                                                        <span class="user-meta-badge">{{ $item->creator->name ?? 'Diterbitkan Oleh HRD' }}</span>
                                                        <span><i class="fa-regular fa-calendar me-1"></i>{{ $item->created_at->format('d M Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-2" style="border-top: 1px solid #e2e8f0;">
                                    <div class="announcement-content pt-2 pb-2" style="white-space: pre-line;">
                                        {{ $item->isi }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 w-100">
                            <div class="dashboard-card-soft text-center py-5">
                                <p class="text-muted-cool mb-0 small">Belum ada pengumuman resmi yang diterbitkan saat ini.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>