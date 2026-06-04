-- Copy data from accounts table
INSERT INTO backupdafac.accounts
SELECT * FROM dafac.accounts;

-- Copy data from barangay table
INSERT INTO backupdafac.barangay
SELECT * FROM dafac.barangay;

-- Copy data from disaster table
INSERT INTO backupdafac.disaster
SELECT * FROM dafac.disaster;

-- Copy data from evac_center table
INSERT INTO backupdafac.evac_center
SELECT * FROM dafac.evac_center;

-- Copy data from family table
INSERT INTO backupdafac.family
SELECT * FROM dafac.family;

-- Copy data from family_members table
INSERT INTO backupdafac.family_members
SELECT * FROM dafac.family_members;

-- Copy data from damages table
INSERT INTO backupdafac.damages
SELECT * FROM dafac.damages;

-- Copy data from relief_distribution table
INSERT INTO backupdafac.relief_distribution
SELECT * FROM dafac.relief_distribution;

-- Copy data from recent activity table
INSERT INTO backupdafac.`recent activity`
SELECT * FROM dafac.`recent activity`;


