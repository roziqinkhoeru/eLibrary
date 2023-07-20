const tableLoader = (colSpan, dataImage) => {
    return `<tr>
                <td colspan="${colSpan}" class="text-center">
                    <div class="d-flex w-100 align-items-center justify-content-center py-2">
                        <object data="${dataImage}" type="image/svg+xml" style="height: 48px !important"></object>
                    </div>
                </td>
            </tr>`;
};
