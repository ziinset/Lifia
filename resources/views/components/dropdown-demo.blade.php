<div>
    <h3>Dropdown Demo</h3>
    
    <!-- Example 1: Simple Dropdown -->
    <div style="margin: 20px 0;">
        <x-dropdown id="userMenu" :trigger="'<div class=\'user-avatar\'><img src=\'https://ui-avatars.com/api/?name=User&background=random\' alt=\'User\' width=\'40\' height=\'40\' style=\'border-radius: 50%;\'></div>'">
            <a href="#" class="dropdown-item">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users"></i>
                <span>Community</span>
            </a>
            <a href="#" class="dropdown-item">
                <i class="fas fa-crown"></i>
                <span>Subscription</span>
                <span class="pro-badge">PRO</span>
            </a>
            <a href="#" class="dropdown-item">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
            <a href="#" class="dropdown-item">
                <i class="fas fa-question-circle"></i>
                <span>Help center</span>
            </a>
            <a href="#" class="dropdown-item">
                <i class="fas fa-sign-out-alt"></i>
                <span>Sign out</span>
            </a>
        </x-dropdown>
    </div>
    
    <!-- Example 2: Button Dropdown -->
    <div style="margin: 20px 0;">
        <x-dropdown id="actionsMenu" :trigger="'<button class=\'btn btn-primary\'>Actions <i class=\'fas fa-chevron-down\'></i></button>'">
            <a href="#" class="dropdown-item">
                <i class="fas fa-edit"></i>
                <span>Edit</span>
            </a>
            <a href="#" class="dropdown-item">
                <i class="fas fa-copy"></i>
                <span>Duplicate</span>
            </a>
            <a href="#" class="dropdown-item">
                <i class="fas fa-trash"></i>
                <span>Delete</span>
            </a>
        </x-dropdown>
    </div>
</div>

@push('styles')
<style>
/* Add this to your main CSS file */
.btn {
    padding: 8px 16px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-primary {
    background: #4F46E5;
    color: white;
}

.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid #E5E7EB;
}

.user-avatar:hover {
    border-color: #9CA3AF;
}
</style>
@endpush
