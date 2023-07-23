const currencyOption = {
    style: "currency",
    currency: "IDR",
    currencyDisplay: "symbol",
    useGrouping: true,
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
};

const localCurrencyIDR = (price) => {
    const coursePrice = parseInt(price);
    return coursePrice.toLocaleString("id-ID", currencyOption);
};
