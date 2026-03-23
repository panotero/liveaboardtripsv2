// fetch function with max retries implemented
window.fetchWithRetry = async function fetchWithRetry(
  url,
  options = {},
  signal = null,
  retries = 3,
  delay = 500,
) {
  let response = null;

  for (let i = 0; i < retries; i++) {
    try {
      // Clone options and attach signal if provided
      const fetchOptions = { ...options };
      if (signal) fetchOptions.signal = signal;

      const res = await fetch(url, fetchOptions);
      const text = await res.text();
      response = text ? JSON.parse(text) : null;

      if (!res.ok) {
        throw new Error(`HTTP error! status: ${res.status}`);
      }

      // Handle responses with no JSON (ex: DELETE / 204)
      const contentType = res.headers.get("Content-Type") || "";
      if (!contentType.includes("application/json")) {
        return null; // or true if DELETE success
      }

      return text ? JSON.parse(text) : null;
    } catch (err) {
      // Handle abort specifically
      if (err.name === "AbortError") {
        console.warn(`Fetch aborted for ${url}`);
        return { response: response, success: false, aborted: true };
      }

      console.warn(`Fetch attempt ${i + 1} failed for ${url}:`, err);

      if (i < retries - 1) {
        await new Promise((r) => setTimeout(r, delay));
      } else {
        console.error(`All fetch attempts failed for ${url}`);
        return { response: response, success: false };
      }
    }
  }
};
