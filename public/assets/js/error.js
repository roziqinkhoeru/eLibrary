const tableError = (colSpan, msg) => {
    return `<tr>
                <td colspan="${colSpan}" class="text-center">
                    <div class="d-flex w-100 align-items-center justify-content-center py-2">
                        <p class="mb-0 py-1">
                            <i class="fas fa-exclamation-triangle mr-2"></i> Terjadi kesalahan dalam mengambil data: ${msg}
                        </p>
                    </div>
                </td>
            </tr>`;
};
