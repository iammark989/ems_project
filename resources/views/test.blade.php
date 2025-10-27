<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    /* Reset */
body, html {
    margin: 0;
    padding: 0;
}

/* Layout base */
.layout {
    display: flex;
}

/* Sidebar */
.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    width: 300px;
    height: 100vh;
    background: #1e1e2f;
    color: white;
    transition: width 0.3s ease;
    overflow: hidden;
}

.sidebar.collapsed {
    width: 60px; /* collapse width */
}

/* Toggle button */
#toggle-btn {
    background: none;
    border: none;
    color: white;
    font-size: 22px;
    margin: 10px;
    cursor: pointer;
}

/* Navbar (Topbar) */
.navbar {
    position: fixed;
    top: 0;
    left: 300px;
    width: calc(100% - 300px);
    height: 60px;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    padding-left: 20px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

/* Navbar adjusts when sidebar collapses */
.sidebar.collapsed ~ .navbar {
    left: 60px;
    width: calc(100% - 60px);
}

/* Content */
.content {
    margin-top: 60px;
    margin-left: 300px;
    padding: 20px;
    transition: margin-left 0.3s ease;
}

.sidebar.collapsed ~ .content {
    margin-left: 60px;
}
</style>
<body>

    <div class="layout">
    <aside class="sidebar" id="sidebar">
        
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </aside>

    <nav class="navbar" id="navbar">
        <h1>Dashboard</h1>
         <button id="toggle-btn">☰</button>
    </nav>

    <main class="content" id="content">
        <p>Welcome to your dashboard!</p>


       
    </main>
</div>
    
</body>
<script>
document.getElementById('toggle-btn').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('collapsed');
});
</script>

</html>