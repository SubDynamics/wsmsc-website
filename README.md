# wsmsc-website

Westside Music Social Club website — built on WordPress 6.9.4.

---

## Local Development Setup (XAMPP on Windows)

Follow these steps to get the site running on your Windows machine using XAMPP.

### Prerequisites

| Tool | Version | Download |
|------|---------|----------|
| XAMPP | 8.2+ (includes Apache, PHP 8.2+, MySQL/MariaDB) | https://www.apachefriends.org/download.html |
| WordPress | 6.9.4 | https://wordpress.org/wordpress-6.9.4.zip |
| Git | Any recent version | https://git-scm.com/download/win |

> **Recommended PHP version:** 8.2 or later (required by WordPress 6.9.4).

---

### Step 1 — Install XAMPP

1. Download XAMPP from https://www.apachefriends.org/download.html and run the installer.
2. Install to the default path (`C:\xampp`).
3. Open the **XAMPP Control Panel** and start both **Apache** and **MySQL**.

---

### Step 2 — Clone this repository

Open a Git Bash or Command Prompt and clone the repository into the XAMPP web root:

```bash
cd C:\xampp\htdocs
git clone https://github.com/SubDynamics/wsmsc-website.git
cd wsmsc-website
```

---

### Step 3 — Download and extract WordPress core

1. Download WordPress 6.9.4 from https://wordpress.org/wordpress-6.9.4.zip
2. Extract the zip. You will get a `wordpress/` folder.
3. Copy **all files and folders** from inside `wordpress/` into `C:\xampp\htdocs\wsmsc-website\` so that `index.php` sits directly in that folder.

   Your directory should look like:

   ```
   C:\xampp\htdocs\wsmsc-website\
   ├── index.php
   ├── wp-admin\
   ├── wp-content\
   │   ├── plugins\
   │   ├── themes\
   │   └── uploads\
   ├── wp-includes\
   ├── wp-config-sample.php   ← already in this repo
   └── ...
   ```

   > **Note:** The `wp-content/` directory that you already cloned from this repository contains the project's custom themes and plugins. When extracting WordPress, **do not overwrite** the existing `wp-content/` folder — simply skip/merge if prompted, or extract WordPress files first and then let the git clone win for `wp-content/`.

---

### Step 4 — Create the MySQL database

1. Open your browser and go to http://localhost/phpmyadmin
2. Click **New** in the left sidebar.
3. Enter the database name: `wsmsc_website`
4. Set the collation to `utf8mb4_unicode_ci`
5. Click **Create**.

---

### Step 5 — Configure WordPress

1. In `C:\xampp\htdocs\wsmsc-website\`, copy the sample config file:

   ```bash
   copy wp-config-sample.php wp-config.php
   ```

2. Open `wp-config.php` in a text editor (e.g., VS Code or Notepad++).
3. The XAMPP defaults are already filled in. Confirm or adjust these values:

   | Setting | Default XAMPP Value |
   |---------|---------------------|
   | `DB_NAME` | `wsmsc_website` |
   | `DB_USER` | `root` |
   | `DB_PASSWORD` | *(empty string)* |
   | `DB_HOST` | `localhost` |

4. Replace the placeholder security keys with unique values generated from:
   https://api.wordpress.org/secret-key/1.1/salt/

5. Save the file.

---

### Step 6 — Run the WordPress installer

1. Open your browser and go to: http://localhost/wsmsc-website/
2. Follow the WordPress installation wizard:
   - **Site Title:** Westside Music Social Club
   - **Username / Password:** choose a secure admin username and password
   - **Email:** your admin email address
3. Click **Install WordPress**.
4. Log in at http://localhost/wsmsc-website/wp-admin/

---

### Step 7 — Enable pretty permalinks (optional but recommended)

1. In the WordPress admin, go to **Settings → Permalinks**.
2. Choose **Post name** (`/%postname%/`).
3. Click **Save Changes**. WordPress will automatically create or update the `.htaccess` file.

   > If you see a permalink warning, enable `mod_rewrite` in XAMPP:
   > Open `C:\xampp\apache\conf\httpd.conf`, find `AllowOverride None` (under the `htdocs` directory block), and change it to `AllowOverride All`. Restart Apache.

---

## Project Structure

```
wsmsc-website/
├── wp-content/
│   ├── plugins/        ← custom/tracked plugins go here
│   └── themes/         ← custom/tracked themes go here
├── wp-config-sample.php  ← template config for local development
├── .gitignore            ← ignores WordPress core, uploads, logs
└── README.md
```

WordPress core files (`wp-admin/`, `wp-includes/`, `wp-*.php`, etc.) and `wp-config.php` are excluded from version control via `.gitignore`. Only the custom `wp-content` assets and project configuration templates are tracked.

---

## Environment Notes

- **PHP:** 8.2 or later
- **MySQL/MariaDB:** 8.0 / 10.6 or later (bundled with XAMPP)
- **WordPress:** 6.9.4
- **Web server:** Apache with `mod_rewrite` enabled
