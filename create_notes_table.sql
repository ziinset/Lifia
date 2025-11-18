-- Drop existing notes table if exists and create new one
DROP TABLE IF EXISTS notes;

-- Create notes table for dashboard notes functionality
CREATE TABLE notes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    color VARCHAR(7) DEFAULT '#FFE066',
    is_pinned BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_user_id (user_id),
    INDEX idx_created_at (created_at),
    INDEX idx_is_pinned (is_pinned)
);

-- Insert sample notes for testing
INSERT INTO notes (user_id, title, content, color, is_pinned) VALUES
(1, 'Meeting Notes', 'Diskusi tentang fitur baru aplikasi Lifia\n- Implementasi sistem notes\n- Update dashboard design\n- Testing functionality', '#FFE066', TRUE),
(1, 'Todo List', '✓ Buat database notes\n• Implementasi frontend\n• Testing CRUD operations\n• Deploy ke production', '#FFB3BA', FALSE),
(1, 'Ideas', 'Ide untuk pengembangan selanjutnya:\n- Notification system\n- Advanced search\n- Mobile app integration', '#BAFFC9', FALSE),
(1, 'Important Reminder', 'Jangan lupa backup database setiap hari!\n\nSchedule:\n- Daily: 02:00 AM\n- Weekly: Sunday 01:00 AM', '#BAE1FF', TRUE);
