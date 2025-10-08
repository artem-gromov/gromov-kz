document.addEventListener("DOMContentLoaded", () => {
  const emailSpan = document.querySelector(".obfuscated-email");
  const footerEmail = document.querySelector(".footer-email");
  const copyBtn = document.querySelector(".copy-email");
  const copyStatus = document.querySelector(".copy-email-status");
  const printBtn = document.getElementById("printCv");
  const printBtnFooter = document.getElementById("printCvFooter");

  const buildEmail = (el) => {
    if (!el) return null;
    const { user, domain } = el.dataset;
    if (!user || !domain) return null;
    return `${user}@${domain}`;
  };

  const email = buildEmail(emailSpan);

  if (email && emailSpan) {
    emailSpan.setAttribute("data-email", email);
    emailSpan.setAttribute("aria-label", `Email ${email}`);
  }

  if (email && footerEmail) {
    footerEmail.addEventListener("click", (evt) => {
      evt.preventDefault();
      window.location.href = `mailto:${email}`;
    });
  }

  if (copyBtn && email) {
    const defaultLabel = copyBtn.textContent;
    copyBtn.addEventListener("click", async () => {
      try {
        await navigator.clipboard.writeText(email);
        copyBtn.textContent = "Copied!";
        copyBtn.classList.add("copied");
        if (copyStatus) {
          copyStatus.textContent = "Email copied to clipboard.";
        }
        setTimeout(() => {
          copyBtn.textContent = defaultLabel;
          copyBtn.classList.remove("copied");
          if (copyStatus) {
            copyStatus.textContent = "";
          }
        }, 1800);
      } catch (err) {
        console.warn("Clipboard copy unavailable", err);
        window.prompt("Copy email to clipboard:", email);
      }
    });
  }

  const triggerPrint = () => window.print();
  if (printBtn) {
    printBtn.addEventListener("click", triggerPrint);
  }
  if (printBtnFooter) {
    printBtnFooter.addEventListener("click", triggerPrint);
  }
  const footerLink = document.querySelector(".footer-print");
  if (footerLink) {
    footerLink.addEventListener("click", triggerPrint);
  }

  const integerFormatter = new Intl.NumberFormat("ru-RU", {
    maximumFractionDigits: 0
  });

  const countTargets = document.querySelectorAll("[data-count-target]");
  if (countTargets.length) {
    const rowsElement = document.querySelector("[data-count-role='rows']");
    const rowsTarget = rowsElement
      ? Number(rowsElement.dataset.countTarget || "0")
      : 0;

    const baseDuration = rowsTarget
      ? Math.min(6500, Math.max(1600, (rowsTarget / 1e9) * 900))
      : 2200;

    const animateCount = (element, target, type, duration) => {
      if (!Number.isFinite(target)) return;
      if (element.dataset.countAnimated === "true") return;
      element.dataset.countAnimated = "true";

      const start = performance.now();
      const from = 0;
      const formatValue =
        type === "decimal"
          ? new Intl.NumberFormat("ru-RU", {
              minimumFractionDigits: 2,
              maximumFractionDigits: 2
            }).format
          : integerFormatter.format;

      const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);

      const frame = (now) => {
        const elapsed = now - start;
        const progress = Math.min(elapsed / duration, 1);
        const eased = easeOutCubic(progress);
        const current = from + (target - from) * eased;
        const displayValue =
          type === "decimal" ? current : Math.round(current);
        element.textContent = formatValue(displayValue);

        if (progress < 1) {
          requestAnimationFrame(frame);
        } else {
          element.textContent = formatValue(target);
        }
      };

      requestAnimationFrame(frame);
    };

    countTargets.forEach((element) => {
      const target = Number(element.dataset.countTarget || "0");
      const type = element.dataset.countType || "integer";
      const ratio =
        rowsTarget > 0 ? Math.min(1.4, Math.max(0.45, target / rowsTarget)) : 1;
      const duration = Math.max(1200, baseDuration * ratio);
      animateCount(element, target, type, duration);
    });
  }
});
