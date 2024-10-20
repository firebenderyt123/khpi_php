<label for="pageSelect">Choose page</label>
<select id="pageSelect">
    <option value="?page=simple">Simple</option>
    <option value="?page=product">Product</option>
</select>

<label for="extSelect">Choose extension</label>
<select id="extSelect">
    <option value=".html">HTML</option>
    <option value=".json">JSON</option>
    <option value=".xml">XML</option>
</select>

<iframe id="myIframe" src="page.php" style="border:none;overflow:hidden;height:100%;width:100%" height="100%" width="100%"></iframe>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const iframe = document.getElementById("myIframe");
        const pageSelector = document.getElementById("pageSelect");
        const extSelector = document.getElementById("extSelect");

        pageSelector.addEventListener("change", changeIframeSrc);
        extSelector.addEventListener("change", changeIframeSrc);

        function changeIframeSrc() {
            const pageUrl = "page.php" + pageSelector.value + extSelector.value;
            if (extSelector.value == ".xml")
                window.open(pageUrl, '__blank');
            iframe.src = pageUrl;
        }
    });
</script>