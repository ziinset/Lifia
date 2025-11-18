<div class="dropdown-container" id="{{ $id }}">
    <div class="dropdown-trigger" id="{{ $id }}-trigger">
        {{ $trigger }}
    </div>
    <div class="dropdown-menu">
        {{ $slot }}
    </div>
</div>

<style>
.dropdown-container {
    position: relative;
    display: inline-block;
}

.dropdown-trigger {
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    padding: 8px 0;
    width: 240px;
    margin-top: 8px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.2s ease;
    z-index: 1000;
    border: 1px solid #f0f0f0;
}

.dropdown-container.active .dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-item {
    display: flex;
    align-items: center;
    padding: 12px 16px;
    color: #1f2937;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.2s ease;
    position: relative;
}

.dropdown-item i:first-child {
    width: 20px;
    margin-right: 12px;
    color: #10B981;
    font-size: 16px;
    text-align: center;
}

.dropdown-item i:last-child {
    margin-left: auto;
    color: #9ca3af;
    font-size: 12px;
}

.dropdown-item:hover {
    background: #f9fafb;
    color: #111827;
}

.dropdown-item:hover i:first-child {
    color: #059669;
}

.pro-badge {
    background: #F59E0B;
    color: white;
    font-size: 10px;
    padding: 2px 6px;
    border-radius: 10px;
    margin-left: auto;
    margin-right: 8px;
    font-weight: 600;
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropdown = document.getElementById('{{ $id }}');
    const trigger = document.getElementById('{{ $id }}-trigger');
    
    if (trigger) {
        trigger.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.classList.toggle('active');
        });
    }
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!dropdown.contains(e.target)) {
            dropdown.classList.remove('active');
        }
    });
});
</script>
@endpush
