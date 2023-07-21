const tableEmpty = (colSpan, target) => {
    return `<tr>
                <td colspan="${colSpan}" class="text-center">
                    <div class="d-flex w-100 align-items-center justify-content-center py-2">
                        <p class="mb-0 py-1">Tidak ada data ${target} yang tersedia di tabel</p>
                    </div>
                </td>
            </tr>`;
};
