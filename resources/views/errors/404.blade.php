<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found • Hospital System</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">

    <style>
        * {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background: #f4f7fc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Medical gradient (teal / blue) */
        .med-gradient {
            background: linear-gradient(135deg, #0d9488 0%, #0891b2 50%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .med-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 40px 30px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 20px rgba(2, 132, 199, 0.08);
        }

        .med-logo-icon {
            font-size: 4rem;
            background: linear-gradient(135deg, #0d9488 0%, #0891b2 50%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .error-number {
            font-size: 4.5rem;
            font-weight: 300;
            color: #1e293b;
            letter-spacing: -3px;
            line-height: 1;
        }

        .med-btn {
            background: #0284c7;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 22px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
        }

        .med-btn:hover {
            background: #0369a1;
            color: #fff;
        }

        .med-heading {
            color: #1e293b;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .med-text {
            color: #64748b;
            font-size: 14px;
            line-height: 1.5;
        }

        .med-divider {
            display: flex;
            align-items: center;
            color: #94a3b8;
            font-size: 13px;
            font-weight: 600;
            margin: 20px 0;
        }

        .med-divider::before,
        .med-divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        .med-divider span {
            padding: 0 18px;
        }

        .med-footer {
            margin-top: auto;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
        }

        .med-footer a {
            color: #94a3b8;
            text-decoration: none;
            margin: 0 8px;
        }

        .med-footer a:hover {
            text-decoration: underline;
            color: #0284c7;
        }

        .error-icon-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .error-icon-wrapper i {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }
    </style>
</head>
<body>

    <!-- Main Content -->
    <div class="flex-grow-1 d-flex align-items-center justify-content-center py-5 px-3">
        <div class="med-card text-center">

            <!-- Medical Logo Icon -->
            <div class="mb-4">
                <i class="mdi mdi-hospital-box med-logo-icon"></i>
            </div>

            <!-- Big 404 with medical cross -->
            <div class="error-icon-wrapper mb-3">
                <span class="error-number">4</span>
                <i class="mdi mdi-medical-bag text-info" style="font-size: 3.5rem; color: #0891b2 !important;"></i>
                <span class="error-number">4</span>
            </div>

            <!-- Heading -->
            <h5 class="med-heading mb-2">Page Not Found</h5>

            <!-- Divider -->
            <div class="med-divider">
                <span>OOPS</span>
            </div>

            <!-- Message -->
            <p class="med-text mb-4">
                Sorry, this page isn't available. The link you followed may be broken, 
                or the page may have been removed from the system.
            </p>

            <!-- CTA Button -->
            <a href="/" class="med-btn d-inline-block text-decoration-none">
                <i class="mdi mdi-home-outline me-1"></i> Return to Dashboard
            </a>

            <!-- Secondary action -->
            <div class="mt-4">
                <a href="javascript:history.back()" 
                   class="med-text text-decoration-none">
                    <i class="mdi mdi-arrow-left"></i> Go back
                </a>
            </div>

        </div>
    </div>

    <!-- Medical-style Footer -->
    <footer class="med-footer">
        <div class="mb-2">
            <a href="#">About</a>
            <a href="#">Departments</a>
            <a href="#">Doctors</a>
            <a href="#">Appointments</a>
            <a href="#">Contact</a>
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
        </div>
        <div class="d-flex align-items-center justify-content-center gap-2">
            <i class="mdi mdi-hospital-box-outline"></i>
            <span>&copy; {{ date('Y') }} Hospital Management System</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>