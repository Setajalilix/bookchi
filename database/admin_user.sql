-- Admin user: phone 09120000001 / password admin123
-- role: 0 = admin, 1 = user

UPDATE users
SET role = 0,
    name = 'مدیر',
    password = '$2y$12$mEwH.nT1S18rsNv2aUGyjeOVG.aLY8H2Sug7cS8IrH3yL5iMRT8ia'
WHERE phone = '09120000001';

INSERT INTO users (role, name, phone, password, created_at)
SELECT 0, 'مدیر', '09120000001', '$2y$12$mEwH.nT1S18rsNv2aUGyjeOVG.aLY8H2Sug7cS8IrH3yL5iMRT8ia', NOW()
WHERE NOT EXISTS (SELECT 1 FROM users WHERE phone = '09120000001');
