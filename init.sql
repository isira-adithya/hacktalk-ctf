-- Table creation
CREATE TABLE users (
    id INT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Inserting sample data
INSERT INTO users (id, username, password) VALUES
(1, 'admin', 'MYvXPAq2fqz82X0jgT8'),
(2, 'jane_smith', 'eV5BaI6z50rDLDdwRi0'),
(3, 'bob_jones', 'HsV5DSXstDyr4o27uB8');
